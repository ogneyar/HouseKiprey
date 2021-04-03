const express = require('express');
const	port = process.env.PORT || 4200;
	
express().use(express.static('dist'))
    .get('*', (req, res) => res.sendFile(__dirname + '/dist/index.html'))
    .listen(port, () => console.log(`Starting server. Listening on ${ port }`));
