import React from 'react';
import FileViewer from 'react-file-viewer';
import FileDownload from 'js-file-download';

function File(props) {

    const fileHash = props.match.params.fileHash;

    window.axios.get('/api/files/' + fileHash, {
        responseType: 'blob'
      })
    .then(response =>  {
        const contentDisposition = response.headers["content-disposition"];
        const match = contentDisposition.match(/filename\s*=\s*"(.+)"/i);
        const filename = match[1];
        FileDownload(response.data, filename);
    })


    return (
        <p>Hold on just downloadiing the file!</p>
    );
}

export { File };