import React from 'react';

import { NavGroup, NavElement } from "../";

export const Nav = props => {

    // Create the navigation which is located on the left. This is made up of several smaller atoms, and molecules.

    return (
        <nav className="bg-light border-right">
            <h1 className="mb-4 mt-3 pl-3">VOCA</h1>

            <NavGroup>
                <NavElement route="/" name="Home" select={props.select} />
            </NavGroup>

            <NavGroup title="Workers">
                <NavElement route="/users" name="All" select={props.select} />
                <NavElement route="/users/create" name="Create" select={props.select} />
            </NavGroup>

            <NavGroup title="Companies">
                <NavElement route="/companies" name="All" select={props.select} />
                <NavElement route="/companies/create" name="Create" select={props.select} />
            </NavGroup>

            <NavGroup title="Lead">
                <NavElement route="/worker_leads" name="Worker" select={props.select} />
                <NavElement route="/company_leads" name="Company" select={props.select} />
            </NavGroup>
        </nav>
    );
}
