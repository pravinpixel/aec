/*
Give the service worker access to Firebase Messaging.
Note that you can only use Firebase Messaging here, other Firebase libraries are not available in the service worker.
*/
importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-messaging.js');

/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
* New configuration for app@pulseservice.com
*/
firebase.initializeApp({
    apiKey: "AIzaSyBaAb6ioNgwKCFSMWarpiBfZr7a3PW_0-c",
    authDomain: "aecprefab-2022.firebaseapp.com",
    databaseURL: "https://aecprefab-2022-default-rtdb.firebaseio.com",
    projectId: "aecprefab-2022",
    storageBucket: "aecprefab-2022.appspot.com",
    messagingSenderId: "896543663736",
    appId: "1:896543663736:web:302c5426c7684b31db2f8d",
    measurementId: "G-2TZQHPFL04"
});

/*
Retrieve an instance of Firebase Messaging so that it can handle background messages.
*/
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function(payload) {
  console.log(
    "[firebase-messaging-sw.js] Received background message ",
    payload,
  );
  /* Customize notification here */
  const notificationTitle = "Background Message Title";
  const notificationOptions = {
    body: "Background Message body.",
    icon: "/itwonders-web-logo.png",
  };

  return self.registration.showNotification(
    notificationTitle,
    notificationOptions,
  );
});
