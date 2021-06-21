import React from 'react';

export const NavElement = props => {


    // This class represents the smallest unit of the navigation bar. We may even be able to break this
    // up into smaller components. The if/else is to determine if that element was selcted based on the given
    // select property.
    if(props.select === props.route)
    {
        return (
            <li className="pl-5 text-light bg-primary">
                <p className="mb-0">{ props.name }</p>
            </li>
        );
    }
    else
    {
        return (
            <li className="pl-4">
                <a href={ props.route }>{ props.name }</a>
            </li>
        );
    }
}
