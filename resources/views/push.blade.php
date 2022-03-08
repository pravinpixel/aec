{{-- @extends('layouts.admin')
@section('admin-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
       <br>
       <br>
       <br>
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
  
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
  
                    <form action="{{ route('send.web-notification') }}" method="POST">
                        @csrf
                        <div class="form-group my-3">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="form-group my-3">
                            <label>Body</label>
                            <textarea class="form-control" name="body"></textarea>
                          </div>
                        <button type="submit" class="btn btn-primary">Send Notification</button>
                    </form>
  
                </div>
            </div>
        </div>
    </div>
</div>
 
<script type="module">
    // Import the functions you need from the SDKs you need
        import { initializeApp } from "https://www.gstatic.com/firebasejs/9.6.8/firebase-app.js";
        import { getMessaging , getToken, onMessage  } from "https://www.gstatic.com/firebasejs/9.6.8/firebase-messaging.js";
        // TODO: Add SDKs for Firebase products that you want to use
        // https://firebase.google.com/docs/web/setup#available-libraries
      
        // Your web app's Firebase configuration
        const firebaseConfig = {
            apiKey: "AIzaSyCZ8uoPo9bfpdc51gVpB91z_X5s-hF7bL4",
            authDomain: "aec-chat-app.firebaseapp.com",
            projectId: "aec-chat-app",
            storageBucket: "aec-chat-app.appspot.com",
            messagingSenderId: "917789039014",
            appId: "1:917789039014:web:b65a02b06faf684aff1767"
        };
      
        // Initialize Firebase
        const app = initializeApp(firebaseConfig);
        
        const messaging = getMessaging();

        getToken(messaging, { vapidKey: 'BFTsn9CD012zl5gz0su0g1eJBQidMy1u4X6EvW2GX_gGt59_cZMd_fFGKqpsFXKjtvqLhuwWaPPBBuS3P6ohirU' }).then((currentToken) => {
            if (currentToken) {
                // Send the token to your server and update the UI if necessary
                console.log(currentToken)
            } else {
                console.log('No registration token available. Request permission to generate one.');
            }
            }).catch((err) => {
                console.log('An error occurred while retrieving token. ', err); 
            });

        // onMessage(messaging, (payload) => {
        //     console.log('Message received. ', payload);
        // });
</script> 
 
@endsection --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- firebase integration started -->

    <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase.js"></script>
    <!-- Firebase App is always required and must be first -->
    <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-app.js"></script>

    <!-- Add additional services that you want to use -->
    <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-database.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-firestore.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-messaging.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-functions.js"></script>

    <!-- firebase integration end -->

    <!-- Comment out (or don't include) services that you don't want to use -->
    <!-- <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-storage.js"></script> -->

    <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.8.0/firebase-analytics.js"></script>
</head>
<body>
    <a href="{{ route('send.web-notification') }}"> Send Notification</a>
    <script>
  
        // Your web app's Firebase configuration
            var firebaseConfig = {
                apiKey: "AIzaSyBaAb6ioNgwKCFSMWarpiBfZr7a3PW_0-c",
                authDomain: "aecprefab-2022.firebaseapp.com",
                databaseURL: "https://aecprefab-2022-default-rtdb.firebaseio.com",
                projectId: "aecprefab-2022",
                storageBucket: "aecprefab-2022.appspot.com",
                messagingSenderId: "896543663736",
                appId: "1:896543663736:web:302c5426c7684b31db2f8d",
                measurementId: "G-2TZQHPFL04"
            };
            // Initialize Firebase
            firebase.initializeApp(firebaseConfig);
            //firebase.analytics();
            const messaging = firebase.messaging();
                messaging.requestPermission().then(function () {
                //MsgElem.innerHTML = "Notification permission granted." 
                    console.log("Notification permission granted.");

                    // get the token in the form of promise
                    return messaging.getToken()
                }).then(function(token) {
            
                console.log(token);
                
                }).catch(function (err) {
                    console.log("Unable to get permission to notify.", err);
            });

            messaging.onMessage(function(payload) {
                console.log(payload);
                var notify;
                notify = new Notification(payload.notification.title,{
                    body: payload.notification.body,
                    icon: payload.notification.icon,
                    tag: "Dummy"
                });
                console.log(payload.notification);
            });

            //firebase.initializeApp(config);
            var database = firebase.database().ref().child("/users/");
            
            database.on('value', function(snapshot) {
                renderUI(snapshot.val());
            });

            // On child added to db
            database.on('child_added', function(data) {
                console.log("Comming");
                if(Notification.permission!=='default'){
                    var notify;
                    notify= new Notification('CodeWife - '+data.val().username,{
                        'body': data.val().message,
                        'icon': 'bell.png',
                        'tag': data.getKey()
                    });
                    notify.onclick = function(){
                        alert(this.tag);
                    }
                }else{
                    alert('Please allow the notification first');
                }
            });

            self.addEventListener('notificationclick', function(event) {       
                event.notification.close();
            }); 
    </script>
</body>
</html>