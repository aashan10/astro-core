import React from 'react';
import ReactDOM from "react-dom";
import Navigation from "./components/navigation";
import Newsletter from "./components/newsletter";
import Register from "./components/register";
import Login from "./components/login";

ReactDOM.render(<Navigation />, document.getElementById('navigation'));
ReactDOM.render(<Newsletter />, document.getElementById('newsletter'));
ReactDOM.render(<Register />, document.getElementById('register'));
ReactDOM.render(<Login />, document.getElementById('register'));
