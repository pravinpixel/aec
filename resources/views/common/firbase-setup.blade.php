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
  
    messaging.onMessage(function({data:{body,title,action_link}}){
        new Notification(title, {body,action_link});
    });
</script>