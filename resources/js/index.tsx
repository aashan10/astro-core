import React from 'react';
import ReactDOM from "react-dom";
import Navigation from "./components/navigation";
import Newsletter from "./components/newsletter";

ReactDOM.render(<Navigation />, document.getElementById('navigation'));
ReactDOM.render(<Newsletter />, document.getElementById('newsletter'));