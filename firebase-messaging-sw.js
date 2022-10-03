// importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
// importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');
   
// firebase.initializeApp({
//   apiKey: "AIzaSyDIIX2032YQqMeMD7ChXJFK8UOtP0qW8y0",
//   authDomain: "aecprefabchatapp.firebaseapp.com",
//   projectId: "aecprefabchatapp",
//   messagingSenderId: "318054015458",
//   appId: "1:318054015458:web:e5ad3622bdff68145e59bb"
// });
  
// const messaging = firebase.messaging();
// messaging.setBackgroundMessageHandler(function({data:{title,body,icon}}) {
//     return self.registration.showNotification(title,{body,icon});
// });


// Give the service worker access to Firebase Messaging.
// Note that you can only use Firebase Messaging here.
// Other Firebase libraries are not available in the service worker.
importScripts("https://www.gstatic.com/firebasejs/7.16.1/firebase-app.js");
importScripts("https://www.gstatic.com/firebasejs/7.16.1/firebase-messaging.js",);

if (firebase.messaging.isSupported()) {
    // Initialize the Firebase app in the service worker by passing in the
    // messagingSenderId.
    firebase.initializeApp({
        apiKey: "AIzaSyDIIX2032YQqMeMD7ChXJFK8UOtP0qW8y0",
        authDomain: "aecprefabchatapp.firebaseapp.com",
        projectId: "aecprefabchatapp",
        messagingSenderId: "318054015458",
        appId: "1:318054015458:web:e5ad3622bdff68145e59bb",
    });

    // Retrieve an instance of Firebase Messaging so that it can handle background messages.
    const messaging = firebase.messaging();

    messaging.setBackgroundMessageHandler(function (payload) {
        console.log(
            "[firebase-messaging-sw.js] Received background message ",
            payload,
        );
        
        // Customize notification here
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
}