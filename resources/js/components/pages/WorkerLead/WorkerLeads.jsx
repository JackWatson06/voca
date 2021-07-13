import React from 'react';

import { ColumnLayout, Nav, ListView, WorkerLeadCard } from '../../';

export const WorkerLeads = props => {

    // Build up the Worker Leads page by using the Column Layout
    return (
        <ColumnLayout>
            <Nav select="/worker_leads" />
            <ListView component={ <WorkerLeadCard/> }  endpoint="api/worker_leads" title="Worker Leads" />
        </ColumnLayout>
    );
}