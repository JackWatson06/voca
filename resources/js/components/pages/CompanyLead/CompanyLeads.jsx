import React from 'react';

import { ColumnLayout, Nav, ListView, CompanyLeadCard } from '../../';

export const CompanyLeads = props => {

    // Build up the Company Leads page by using the column layout
    return (
        <ColumnLayout>
            <Nav select="/company_leads" />
            <ListView component={ <CompanyLeadCard/> }  endpoint="api/company_leads" title="Company Leads" />
        </ColumnLayout>
    );
}