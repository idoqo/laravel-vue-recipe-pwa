importScripts(
    'https://storage.googleapis.com/workbox-cdn/releases/4.3.1/workbox-sw.js'
);

workbox.precaching.precacheAndRoute([{"revision":"d41d8cd98f00b204e9800998ecf8427e","url":"css/app.css"},{"revision":"6fe6f7c7ba08cd7d44c434218cdbd98a","url":"js/app.js"},{"revision":"81c32a6f7ddf732b1a48bceea2a76e43","url":"offline.html"}]);
