import React from "react";

export const CompanyLeadCard = props => {


    //Generate the Company Lead list page.
    // TODO this needs some major refacotring as we can break this down into smaller componoents.
    return (
        <div className="card text-left mb-4 mt-4" key={props.data.id}>
            <div className="card-header font-weight-bold">
                <h4 className="mb-2 mt-2">{props.data.fname + " " + props.data.lname}: {props.data.industry}</h4>
            </div>
            <div className="card-body">
                <div className="row">
                    <div className="col-4 text-right p-0">
                        <p className="font-weight-bold pr-2">Phone: </p>
                    </div>

                    <div className="col-4 d-flex flex-row justify-content-between p-0">
                        <p>{props.data.phone}</p>
                        <p className="font-weight-bold pr-2">Email: </p>
                    </div>

                    <div className="col-4 text-left p-0">
                        <p>{props.data.email}</p>
                    </div>
                </div>

                <div className="row">
                    <div className="col-4 text-right p-0">
                        <p className="font-weight-bold pr-2">Company Name: </p>
                    </div>

                    <div className="col-4 d-flex flex-row justify-content-between p-0">
                        <p>{props.data.company_name}</p>
                        <p className="font-weight-bold pr-2">Industry: </p>
                    </div>

                    <div className="col-4 text-left p-0">
                        <p>{props.data.industry}</p>
                    </div>
                </div>

                <div className="row">
                    <div className="col-4 text-right p-0">
                        <p className="font-weight-bold pr-2">Size: </p>
                    </div>

                    <div className="col-4 d-flex flex-row justify-content-between p-0">
                        <p>{props.data.size}</p>
                        <p className="font-weight-bold pr-2">Info: </p>
                    </div>

                    <div className="col-4 text-left p-0">
                        <p>{props.data.info}</p>
                    </div>
                </div>

                <div className="d-flex flex-row justify-content-end">
                    {/* <a href={'/worker_leads/' + props.data.id} className="btn btn-primary mr-3">Profile</a> */}
                </div>
            </div>

        </div>
    );

}
