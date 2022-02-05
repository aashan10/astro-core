<?php

namespace Astro\Core\Database;

use Astro\Core\Connection;
use Astro\Core\Data\DataObject;
use Astro\Exceptions\NotFoundException;

abstract class CrudQueries
{
    use DataObject;

    /**
     * @var Connection
     */
    protected $connection;

    /**
     * @var string
     */
    protected $table;

    /**
     * @var string
     */
    protected $primaryKey;

    /**
     * @return string
     */
    public function getPrimaryKey(): string
    {
        return $this->primaryKey;
    }

    public function getTable(): string
    {
        return $this->table;
    }

    public function getConnection(): Connection
    {
        return $this->connection;
    }

    public function find(string $id, string $column = '', array $fields = []): object
    {
        if ($column === '') {
            $column = $this->getPrimaryKey();
        }
        $column = '`' . $column . '`';

        if ($fields === []) {
            $fields = '*';
        } else {
            $fields = collect($fields)->map(function ($field) {
                return '`' . $field . '`';
            })->toArray();
            $fields = implode(',', $fields);
        }

        $record = $this->getConnection()
            ->getDb()
            ->query('SELECT ' . $fields . ' from ' . $this->getTable() . ' WHERE ' . $column . ' = ' . $id)
            ->fetchObject(static::class, [$this->getConnection()]);
        if (!$record) {
            throw new NotFoundException('Record not found!');
        }
        return $record;
    }

    /**
     * @param array $data
     * @return false|object
     * @throws NotFoundException
     */
    public function create(array $data)
    {
        $fields = '(' . implode(', ', collect(array_keys($data))->map(function ($field) {
                return '`' . $field . '`';
            })->toArray()) . ')';
        $values = '(' . implode(', ', collect(array_values($data))->map(function ($value) {
                return '\'' . $value . '\'';
            })->toArray()) . ')';
        $query = 'INSERT INTO ' . $this->getTable() . ' ' . $fields . ' VALUES ' . $values;
        $db = $this->getConnection()->getDb();
        $inserted = $db->exec($query);
        if($inserted) {
            $id = $db->lastInsertId();
            return $this->find($id);
        }
        return false;
    }

    public function save()
    {
        if($this->getData($this->getPrimaryKey())) {
            return $this->update();
        }
        return $this->create($this->getData());
    }

    public function update(array $data = []): self
    {
        if(!empty($data)) {
            $this->data = array_merge($this->data, $data);
        }
        $data = $this->getData();
        $id = $this->getData($this->getPrimaryKey());

        $updatedFields = trim(implode(', ', collect($data)->map(function ($value, $key) {
            if($key === $this->getPrimaryKey()) {
                return false;
            }
            return '`' . $key . '` = \'' . $value . '\'';
        })->toArray()), ', ');

        $query = 'UPDATE `' . $this->getTable() . '` SET ' . $updatedFields . ' WHERE `' . $this->getPrimaryKey() . '` = \'' . $id . '\';';
        $this->getConnection()->getDb()->exec($query);
        return $this;


    }
}