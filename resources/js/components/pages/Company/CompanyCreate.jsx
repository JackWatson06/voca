import React from 'react';

import { ColumnLayout, Nav, CreateForm, CompanyInput } from '../../';

export const CompanyCreate = props => {
    // Build up the Company Leads page by using the column layout
    return (
        <ColumnLayout>
            <Nav select="/companies/create" />
            <CreateForm component={ <CompanyInput/> } endpoint="api/companies" title="Add Company" />
        </ColumnLayout>
    );
}