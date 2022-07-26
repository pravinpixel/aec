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
  apiKey: "AIzaSyCZ8uoPo9bfpdc51gVpB91z_X5s-hF7bL4",
  authDomain: "aec-chat-app.firebaseapp.com",
  databaseURL: "https://aec-chat-app-default-rtdb.firebaseio.com",
  projectId: "aec-chat-app",
  storageBucket: "aec-chat-app.appspot.com",
  messagingSenderId: "917789039014",
  appId: "1:917789039014:web:b65a02b06faf684aff1767",
  measurementId: "G-Q0HGWESJ9T"
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