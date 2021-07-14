import React, { useState } from "react";

export const ListView = props => {

    const [loading, setLoading] = useState(true);
    const [data, setData] = useState([]);

    // Send a request to get the file from the server.
    if(loading)
        window.axios.get(props.endpoint)
            .then(response =>  {
                setData(response.data);
                setLoading(false);
            });

    // Generate a list page with the given data-display component.
    return (
        <div className="container-md overflow-auto">
            <h1 className="mt-4">{props.title}</h1>
            <hr></hr>
            
            {loading &&
                <div className="alert alert-primary text-center msg">
                    <strong>Loading</strong>
                </div>
            }
            {data.map((value, index) => {
                return React.cloneElement(props.component, { data: value } );
            })}
        </div>
    );
}
