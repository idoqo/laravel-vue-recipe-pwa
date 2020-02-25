importScripts("https://www.gstatic.com/firebasejs/6.4.0/firebase-app.js");
importScripts("https://www.gstatic.com/firebasejs/6.4.0/firebase-messaging.js");

let config = {
    apiKey: "AIzaSyARBvceffvi7LPj5t-WOzogMknh9-RRRg8",
    projectId: "recipe-pwa-6dbda",
    messagingSenderId: "564055728232",
    appId: "1:564055728232:web:e6a510d2402ddb471e5bdd",
};
firebase.initializeApp(config);
const messaging = firebase.messaging();
console.log(messaging.getToken());
messaging.setBackgroundMessageHandler(function (payload) {
    console.log(' Received background message ', payload);
    let title = 'Recipe PWA',
        options = {
            body: "New Recipe Alert",
            icon: "https://raw.githubusercontent.com/idoqo/laravel-vue-recipe-pwa/master/public/recipe-book.png"
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
