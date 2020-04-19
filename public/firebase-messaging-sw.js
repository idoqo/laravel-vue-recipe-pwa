importScripts("https://www.gstatic.com/firebasejs/7.8.2/firebase-app.js");
importScripts("https://www.gstatic.com/firebasejs/7.8.2/firebase-messaging.js");

let config = {
    apiKey: "FIREBASE_API_KEY",
    authDomain: "FIREBASE_AUTH_DOMAIN",
    projectId: "FIREBASE_PROJECT_ID",
    messagingSenderId: "FIREBASE_MESSENGER_ID",
    appId: "FIREBASE_APP_ID",
};
firebase.initializeApp(config);
const messaging = firebase.messaging();
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
