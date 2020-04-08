import firebase from 'firebase/app';
import axios from 'axios';
import 'firebase/messaging';

const registerToken = (token) => {
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
        let config = {
            apiKey: "AIzaSyARBvceffvi7LPj5t-WOzogMknh9-RRRg8",
            projectId: "recipe-pwa-6dbda",
            messagingSenderId: "564055728232",
            appId: "1:564055728232:web:e6a510d2402ddb471e5bdd",
        };
        firebase.initializeApp(config);
        const messaging = firebase.messaging();
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
    }
}
