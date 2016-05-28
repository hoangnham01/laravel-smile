var head    = document.getElementsByTagName('head')[0];
var script  = document.createElement('script');
script.type = 'text/javascript';
script.src  = 'http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1';
head.appendChild(script);