<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.js" integrity="sha512-rozBdNtS7jw9BlC76YF1FQGjz17qQ0J/Vu9ZCFIW374sEy4EZRbRcUZa2RU/MZ90X2mnLU56F75VfdToGV0RiA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    // Your web app's Firebase configuration
    var firebaseConfig = {
        apiKey: "AIzaSyDIIX2032YQqMeMD7ChXJFK8UOtP0qW8y0",
        authDomain: "aecprefabchatapp.firebaseapp.com",
        projectId: "aecprefabchatapp",
        storageBucket: "aecprefabchatapp.appspot.com",
        messagingSenderId: "318054015458",
        appId: "1:318054015458:web:e5ad3622bdff68145e59bb"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);

    const messaging = firebase.messaging();

    function initFirebaseMessagingRegistration() {
        messaging.requestPermission().then(function () {
            return messaging.getToken()
        }).then(function(token) {
            axios.post("{{ route('save-token') }}",{
                token : token
            }).then(({data})=>{
            }).catch(({response:{data}})=>{
                console.error(data)
            })
        }).catch(function (err) {
            console.log(`Token Error :: ${err}`);
        });
    }

    initFirebaseMessagingRegistration();


    self.addEventListener('notificationclick', function(event) {
        let url = event.notification.tag;//.click_action;
        event.notification.close(); // Android needs explicit close.
        event.waitUntil(
            clients.matchAll({type: 'window'}).then( windowClients => {
                // Check if there is already a window/tab open with the target URL
                for (var i = 0; i < windowClients.length; i++) {
                    var client = windowClients[i];
                    // If so, just focus it.
                    if (client.url === url && 'focus' in client) {
                        return client.focus();
                    }
                }
                // If not, then open the target URL in a new window/tab.
                if (clients.openWindow) {
                    return clients.openWindow(url);
                }
            })
        );
    });
  
    // messaging.onMessage(function({data:{body,title,action_link}}){
    //     new Notification(title, {body,action_link});
    // });

    messaging.setBackgroundMessageHandler(function (payload) {
    //console.log('[firebase-messaging-sw.js] Received background message ', payload);
        return self.registration.showNotification("[BG] " + payload.data.title,
            Object.assign({data: payload.data}, payload.data));

    });
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/firebase-messaging-sw.js').then(registration => {
        messaging.useServiceWorker(registration)
        }).catch(err => console.log('Service Worker Error', err));
    } else {
        alert('Push not supported.');
    }

    messaging.onMessage(function(payload) {
    //console.log('Message received. ', payload);
    
        const notificationTitle = "[FG]" + payload.data.title;
            const notificationOptions = {
                body: payload.data.body,
                icon: payload.data.icon,
                requireInteraction: payload.data.requireInteraction,
                tag: payload.data.tag
            };

            if (!("Notification" in window)) {
                console.log("This browser does not support system notifications");
            }
            // Let's check whether notification permissions have already been granted
            else {
            if (Notification.permission === "granted") {
                // If it's okay let's create a notification
                try {
                var notification = new Notification(notificationTitle, notificationOptions);
                notification.onclick = function(event) {
                    event.preventDefault(); //prevent the browser from focusing the Notification's tab
                    window.open(payload.data.tag, '_blank');
                    notification.close();
                }
                } catch (err) {
                try { //Need this part as on Android we can only display notifications thru the serviceworker
                    navigator.serviceWorker.ready.then(function(registration) {              
                    registration.showNotification(notificationTitle, notificationOptions);
                    });
                } catch (err1) {
                    console.log(err1.message);
                }
                }
            }
            }
        });
</script>