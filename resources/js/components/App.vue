<template>
    <div>
        <div class="sticky-top alert alert-primary" v-if="requestPermission"
             v-on:click="enableNotifications">
            Want to know when we publish a new recipe?
            <button class="btn btn-sm btn-dark">Enable Notifications</button>
        </div>
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <router-link :to="{name: 'home'}" class="navbar-brand">Recipe PWA</router-link>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li>
                            <router-link :to="{name: 'home'}" class="nav-link">Recipes</router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="py-4">
            <router-view></router-view>
        </div>
    </div>
</template>
<script>
    import firebase from "firebase/app";
    import axios from "axios";
    import "firebase/messaging";

    export default {
        data() {
            return {
                get requestPermission() {
                    return (localStorage.getItem("notificationPref") === null)
                },
                set requestPermission(value) {
                    localStorage.setItem("notificationPref", value)
                }
            }
        }
        ,
        methods: {
            registerToken(token) {
                axios
                    .post(
                        "/api/register-token",
                        {
                            token: token
                        },
                        {
                            headers: {
                                "Content-type": "application/json",
                                Accept: "application/json"
                            }
                        }
                    )
                    .then(response => {
                        console.log(response)
                    });
            },

            enableNotifications() {
                if (!("Notification" in window)) {
                    alert("Notifications are not supported");
                } else if (Notification.permission === "granted") {
                    this.initializeFirebase();
                } else if (Notification.permission !== "denied") {
                    Notification.requestPermission().then((permission) => {
                        if (permission === "granted") {
                            this.initializeFirebase();
                        }
                    })
                } else {
                    alert("No permission to send notification")
                }
                this.requestPermission = Notification.permission;
            },

            initializeFirebase() {
                if (firebase.messaging.isSupported()) {
                    let config = {
                        apiKey: "FIREBASE_API_KEY",
                        authDomain: "FIREBASE_AUTH_DOMAIN",
                        projectId: "FIREBASE_PROJECT_ID",
                        messagingSenderId: "FIREBASE_MESSENGER_ID",
                        appId: "FIREBASE_APP_ID",
                    };
                    firebase.initializeApp(config);
                    const messaging = firebase.messaging();

                    messaging.getToken()
                        .then((token) => {
                            console.log(token);
                            this.registerToken(token)
                        })
                        .catch((err) => {
                            console.log('An error occurred while retrieving token. ', err);
                        });

                    messaging.onMessage(function (payload) {
                        console.log("Message received", payload);
                        let n = new Notification("New Recipe alert!")
                    });
                }
            }
        }
    };
</script>
