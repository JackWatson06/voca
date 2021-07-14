import React from "react";

export const NavGroup = props => {

    let titleTag;
    let lineBreak;

    // If we do not have a title then do not label the navigation group.
    if(props.title != "")
        titleTag = <h5 className="pl-3">{ props.title }</h5>; 

    // If we specified the break to be false do not include a line break. Otherwise include a default line break.
    if(props.break == true || props.break == null)
        lineBreak = <hr></hr>;

    // Use the Navigation Elements which are listed as the children of the main navigation element.
    return (
        <>
            { titleTag }
            <ul className="list-inline">
                { props.children }
            </ul>
            { lineBreak }
        </>

    )

}
