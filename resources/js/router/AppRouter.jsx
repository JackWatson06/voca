import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router, Route } from "react-router-dom";

import { Home } from '../components/pages/Home.jsx';
import { File } from '../components/pages/File.jsx';

function AppRouter() {
    return (
        <Router>
            <Route exact path="/" component={ Home } />

            <Route path="/file/:fileHash" component={ File } />
        </Router>
    );
}

if (document.getElementById('content'))
{
    ReactDOM.render(<AppRouter />, document.getElementById('content'));
}
    