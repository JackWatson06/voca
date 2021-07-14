import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router, Route } from "react-router-dom";


// Import all of the different views of the application.
import {
    Home, 

    WorkerLead, 
    WorkerLeads, 

    CompanyLead, 
    CompanyLeads,

    CompanyCreate,
    CompanyEdit,
    Companies,
    Company,

    UserCreate,
    UserEdit,
    Users,
    User,

    File, 

} from '../components';


// Determine what page we are currently on utilizing REACT router.
function AppRouter() {
    return (
        <Router>
            <Route exact path="/" component={ Home } />

            <Route path="/worker_leads"         component={ WorkerLeads } />
            <Route path="/worker_leads/:id"     component={ WorkerLead } />

            <Route path="/company_leads"        component={ CompanyLeads } />
            <Route path="/company_leads/:id"    component={ CompanyLead } />

            <Route path="/companies"            component={ Companies } />
            <Route path="/companies/create"     component={ CompanyCreate } />
            <Route path="/companies/:id"        component={ Company } />
            <Route path="/companies/:id/edit"   component={ CompanyEdit } />

            <Route path="/users"                component={ Users } />
            <Route path="/users/create"         component={ UserCreate } />
            <Route path="/users/:id"            component={ User } />
            <Route path="/users/:id/edit"       component={ UserEdit } />

            <Route path="/file/:fileHash"       component={ File } />
        </Router>
    );
}


// Load in the correct router to the content tag of the page.
if (document.getElementById('content'))
{
    ReactDOM.render(<AppRouter />, document.getElementById('content'));
}
    