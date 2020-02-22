import firebase from 'firebase/app';
import axios from 'axios';
import 'firebase/messaging';

const registerToken = (token) => {
    console.log("axios here:");
    axios.post('/api/register-token', {
        token: token
    }, {
        headers: {
            "Content-type": "application/json",
            "Accept": "application/json"
        }
    }).then((response) => {
            console.log(response);
        });
};

export function initializeFirebase() {
    if (firebase.messaging.isSupported()) {
        const config = {
            apiKey: "AIzaSyARBvceffvi7LPj5t-WOzogMknh9-RRRg8",
            authDomain: "recipe-pwa-6dbda.firebaseapp.com",
            databaseURL: "https://recipe-pwa-6dbda.firebaseio.com",
            projectId: "recipe-pwa-6dbda",
            storageBucket: "recipe-pwa-6dbda.appspot.com",
            messagingSenderId: "564055728232",
            appId: "1:564055728232:web:e6a510d2402ddb471e5bdd",
            measurementId: "G-F2JH8HM25G"
        };
        firebase.initializeApp(config);
        const messaging = firebase.messaging();
        //messaging.requestPermission()
        messaging.requestPermission()
            .then(() => {
                    return messaging.getToken();
            })
            .then(token => {
                //todo send token to backend to create binding
                console.log("token: " + token);
                registerToken(token);
            })
            .catch(error => {
                console.error('Error: ', error);
            });

        messaging.onMessage((payload) => {
            let sender = "Michael";
            console.log(JSON.parse(payload.data.twi_body));
            let title = "Recipe PWA",
                options = {
                    body: "hello world",
                    icon: "https://raw.githubusercontent.com/mdn/pwa-examples/master/a2hs/icon/fox-icon.png"
                };
            let notification = new Notification(title, options);
            notification.onclick = (event) => {
                notification.close();
                console.log(event);
            }
        });
    }
}
