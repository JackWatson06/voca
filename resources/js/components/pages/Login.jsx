import React, { useState } from 'react';
import ReactDOM from 'react-dom';

// Login component
const Login = props => {

    const [ email, setEmail ] = useState("");
    const [ password, setPassword ] = useState("");
    const [ invalid, setInvalid ] = useState("");


    // Try to login the user against the login endpoint.
    const handleSubmit = event => 
    {
        event.preventDefault();

        window.axios.get('/sanctum/csrf-cookie').then(response => {
            window.axios.post('/login', {
                email: email,
                password: password
            }).then(response => {
                window.location.href = '';
            }).catch(error => {
                setInvalid(true);
            });
        });
    }


    // Display the Login page.
    // TODO this can be broken up into individual atoms.
    return(
        <div className="w-100 h-100 d-flex flex-column justify-content-center align-items-center pb-5">
            <h1 className="display-1">VOCA</h1>

            {invalid &&
                <div className="alert alert-danger text-center msg">
                    <strong>Invalid username, or password. Please try again!</strong>
                </div>
            }

            <form onSubmit={ evt => handleSubmit(evt)} className="text-center">
                <div className="form-group">
                    <input 
                        type = "email" 
                        name = "email" 
                        placeholder = "Email"
                        autoComplete = "on" 
                        value = { email }
                        onChange = { e => setEmail(e.target.value) } />
                </div>
                <div className="form-group">
                    <input 
                        type = "password" 
                        name = "password" 
                        placeholder = "Password"
                        autoComplete = "on" 
                        value = { password }
                        onChange = { e => setPassword(e.target.value) } />
                </div>
                <button className="btn btn-primary" type="submit" >Log In</button>
            </form>
        </div>
    );
}

// Load the login page to the content section.
if (document.getElementById('content'))
    ReactDOM.render(<Login />, document.getElementById('content'));
