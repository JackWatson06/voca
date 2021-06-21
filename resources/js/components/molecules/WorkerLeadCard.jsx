import React from "react";

export const WorkerLeadCard = props => {


    // Create the WorkerLeadCard... TODO this needs some major refactoring into more generic components, and
    // atoms.
    return (
        <div className="card text-left mb-4 mt-4" key={props.data.id}>
            <div className="card-header font-weight-bold">
                <h4 className="mb-2 mt-2">{props.data.fname + " " + props.data.lname}: {props.data.trade}</h4>
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
                        <p className="font-weight-bold pr-2">Trade: </p>
                    </div>

                    <div className="col-4 d-flex flex-row justify-content-between p-0">
                        <p>{props.data.trade}</p>
                        <p className="font-weight-bold pr-2">Documents: </p>
                    </div>

                    <div className="col-4 text-left p-0">
                        {props.data.documents.length != 0 ? 
                            props.data.documents.map((value, index) => {
                                return <a target="_blank" rel="noopener noreferrer" href={"/file/" + value.hash_name}>{value.name}</a>
                            })
                            :
                            <p>None</p>
                        }
                    </div>
                </div>

                <div className="row">
                    <div className="col-4 text-right p-0">
                        <p className="font-weight-bold pr-2">Info: </p>
                    </div>

                    <div className="col-4 d-flex flex-row justify-content-between p-0">
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
