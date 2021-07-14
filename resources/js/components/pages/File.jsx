import React from 'react';
import FileDownload from 'js-file-download';

export const File = props => {

    // Get the file hash from the route parameters
    const fileHash = props.match.params.fileHash;

    // Send a request to get the file from the server.
    window.axios.get('/api/files/' + fileHash, {
        responseType: 'blob'
      })
    .then(response =>  {

        // Once we got the response then download the file to the user.
        const contentDisposition = response.headers["content-disposition"];
        const match = contentDisposition.match(/filename\s*=\s*"(.+)"/i);
        const filename = match[1];
        FileDownload(response.data, filename);

    })

    return (
        <p>Downloading File!</p>
    );
}
