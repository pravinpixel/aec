importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');
   
firebase.initializeApp({
  apiKey: "AIzaSyDIIX2032YQqMeMD7ChXJFK8UOtP0qW8y0",
  authDomain: "aecprefabchatapp.firebaseapp.com",
  projectId: "aecprefabchatapp",
  messagingSenderId: "318054015458",
  appId: "1:318054015458:web:e5ad3622bdff68145e59bb"
});
  
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function(data) {
  console.log(data)
    // return self.registration.showNotification(title,{body,icon,click_action});
});