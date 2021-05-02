import axios from 'axios';
import React from 'react';

class Home extends React.Component {


    handleLogout(evt)
    {
        window.axios.post('/logout').then(response => {
            window.location.href = '/login'; 
        })
    }

    render() {
        return (
            <div className="w-100 h-100 d-flex flex-column justify-content-center align-items-center pb-5">
                <h1 className="display-1">VOCA</h1>
                <p>The start of something great...</p>

                <button className="btn btn-primary" type="submit" onClick={evt => this.handleLogout(evt)}>Log Out</button>
            </div>
        );
    };
}

export { Home };
