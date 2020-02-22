importScripts("https://www.gstatic.com/firebasejs/6.4.0/firebase-app.js");
importScripts("https://www.gstatic.com/firebasejs/6.4.0/firebase-messaging.js");

let firebaseConfig = {
    apiKey: "AIzaSyARBvceffvi7LPj5t-WOzogMknh9-RRRg8",
    authDomain: "recipe-pwa-6dbda.firebaseapp.com",
    databaseURL: "https://recipe-pwa-6dbda.firebaseio.com",
    projectId: "recipe-pwa-6dbda",
    storageBucket: "recipe-pwa-6dbda.appspot.com",
    messagingSenderId: "564055728232",
    appId: "1:564055728232:web:e6a510d2402ddb471e5bdd",
    measurementId: "G-F2JH8HM25G"
};
firebase.initializeApp(firebaseConfig);
const messaging = firebase.messaging();
console.log(messaging.getToken());
messaging.setBackgroundMessageHandler(function (payload) {
    console.log(' Received background message ', payload);
    let title = 'Recipe PWA',
        options = {
            body: "Hello world"
        };
    return self.registration.showNotification(
        title,
        options
    );
});
self.addEventListener('notificationclick', function (event) {
    event.notification.close();
    //handle click event onClick on Web Push Notification
});
