import React from 'react';

export const Logout = props => {
    
    const handleLogout = evt =>
    {
        // Redirect user once we log out.
        window.axios.post('/logout').then(response => {
            window.location.href = '/login'; 
        })
    }

    // Logout the user from the website.
    return (
        <>
            <div className="w-100 h-100 d-flex flex-column justify-content-center align-items-center pb-5">
                <h1 className="display-1">VOCA</h1>
                <p>The start of something great...</p>

                <button className="btn btn-primary" type="submit" onClick={evt => handleLogout(evt)}>Log Out</button>
            </div>
        </>
    )

}