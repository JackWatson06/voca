import React, { useState } from "react";

/*

props.postEndpoint = '/api/users/12' | '/api



*/



export const ListView = props => {

    const edit = props.edit;

    const handleSubmit = (evt) => 
    {

        let formData = new FormData(e.target);

        // Convert the form data into parameters we can pass into the
        var params = new URLSearchParams();
        for(var pair of formData.entries()){
            typeof pair[1]=='string' && params.append(pair[0], pair[1]);
        }
        params = params.toString();

        window.axios.post(props.postEndpoint, {
            method: edit ? 'PATCH' : 'POST',
            params: params
        }).then(response => {
            window.location.href = '';
        }).catch(error => {
            setInvalid(true);
        });
    }
    
    // Send a request to get the file from the server.
    if(edit)
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

            {invalid &&
                <div className="alert alert-danger text-center msg">
                    <strong>Invalid!</strong>
                </div>
            }
            
            <form onSubmit={ evt => handleSubmit(evt)}>
                { React.cloneElement(props.component, { data: data } ) }
            </form>
        </div>
    );
}
