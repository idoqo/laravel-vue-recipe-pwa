importScripts("https://www.gstatic.com/firebasejs/7.8.2/firebase-app.js");
importScripts("https://www.gstatic.com/firebasejs/7.8.2/firebase-messaging.js");

let config = {
    apiKey: "AIzaSyAsa8XqeVjHSu1R0oQYiu3bo57jtBx230E",
    authDomain: "notifier-fccd5.firebaseapp.com",
    projectId: "notifier-fccd5",
    messagingSenderId: "240088011234",
    appId: "1:240088011234:web:247054ae2ce907a90269bb",
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
