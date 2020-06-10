/*
 * Give the service worker access to Firebase Messaging.
 * Note that you can only use Firebase Messaging here, other Firebase libraries are not available in the service worker.
*/
importScripts('https://www.gstatic.com/firebasejs/7.15.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.15.0/firebase-messaging.js');

// Firebase confing
var firebaseConfig = {
    apiKey: "<<FCM_API_KEY>>",
    authDomain: "<<FCM_AUTH_DOMAIN>>.firebaseapp.com",
    databaseURL: "https://<<FCM_DATABASE_URL>>.firebaseio.com",
    projectId: "<<FCM_PROJECT_ID>>",
    storageBucket: "<<FCM_STORAGE_BUCKET>>.appspot.com",
    messagingSenderId: "<<FCM_MESSAGING_SENDER_ID>>",
    appId: "<<FCM_APP_ID>>",
    measurementId: "<<FCM_MEASUREMENT_ID>>"
};

// Initialize Firebase
firebase.initializeApp(firebaseConfig);

/*
 * Retrieve an instance of Firebase Messaging so that it can handle background messages.
*/
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function(payload) {
    console.log('[firebase-messaging-sw.js] Received background message ', payload);

    // Customize notification here
    const notificationTitle = payload.data.title;
    const notificationOptions = {
        body: payload.data.body,
        icon: '',
        image: ''
    };

    return self.registration.showNotification(
        notificationTitle,
        notificationOptions
    );
});