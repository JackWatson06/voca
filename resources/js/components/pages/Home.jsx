import React from 'react';

import { ColumnLayout, Nav, Logout } from '../';

export const Home = props => {

    // Build up the home page using the Column Template
    return (
        <ColumnLayout>
            <Nav select="/" />
            <Logout />
        </ColumnLayout>
    );
}
