import React from 'react';
import ReactDOM from 'react-dom';

class Login extends React.Component {

    constructor(props) {
        super(props);

        this.state = {
            email: "",
            password: "",
            invalid: false
          };

     }    

    handleInputChange(event) {
        const target = event.target;
        const value = target.value;
        const name = target.name;

        this.setState({
            [name]: value
        });
    }

    handleSubmit(event) {

        event.preventDefault();

        window.axios.get('/sanctum/csrf-cookie').then(response => {
            window.axios.post('/login', {
                email: this.state.email,
                password: this.state.password
            }).then(response => {
                window.location.href = '';
            }).catch(error => {
                this.setState({
                    invalid: true
                });
            });
        });
        
    }

    render() 
    {
        const error = this.state.invalid;

        return(
            <div className="w-100 h-100 d-flex flex-column justify-content-center align-items-center pb-5">
                <h1 className="display-1">VOCA</h1>

                {error &&
                    <div className="alert alert-danger text-center msg">
                        <strong>Invalid username, or password. Please try again!</strong>
                    </div>
                }

                <form onSubmit={ evt => this.handleSubmit(evt)} className="text-center">
                    <div className="form-group">
                        <input type="email" name="email" placeholder="Email" 
                            value={this.state.email}
                            onChange={evt => this.handleInputChange(evt)} />
                    </div>
                    <div className="form-group">
                        <input type="password" name="password" placeholder="Password" 
                            value={this.state.password}
                            onChange={evt => this.handleInputChange(evt)} />
                    </div>
                    <button className="btn btn-primary" type="submit" >Log In</button>
                </form>
            </div>
        );
    }
}

if (document.getElementById('content'))
    ReactDOM.render(<Login />, document.getElementById('content'));
