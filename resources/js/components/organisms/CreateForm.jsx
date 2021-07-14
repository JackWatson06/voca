import React, { useState } from "react";

/*

props.title = "Create Whatever"
props.endpoint = '/api/users'
props.inputs = InputComponent

*/

export const CreateForm = props => {

    console.log(props);

    const [invalid, setInvalid] = useState(false);

    const handleSubmit = (evt) => 
    {
        let formData = new FormData(e.target);

        // Convert the form data into parameters we can pass into the
        var params = new URLSearchParams();
        for(var pair of formData.entries()){
            typeof pair[1]=='string' && params.append(pair[0], pair[1]);
        }
        params = params.toString();

        window.axios.post(props.endpoint, {
            method: 'POST',
            params: params
        }).then(response => {
            window.location.href = '';
        }).catch(error => {
            setInvalid(true);
        });
    }

    // Generate a list page with the given data-display component.
    return (
        <div className="container-md overflow-auto">
            <h1 className="mt-4">{props.title}</h1>
            <hr></hr>

            {invalid &&
                <div className="alert alert-danger text-center msg">
                    <strong>Invalid username, or password. Please try again!</strong>
                </div>
            }
            
            <form onSubmit={ evt => handleSubmit(evt)}>
                { React.cloneElement(props.component) }
            </form>
        </div>
    );
}
