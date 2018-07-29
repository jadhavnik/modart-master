 
// Initialize Firebase
  var config = {
    apiKey: "AIzaSyBDkOVZVPDfB2ftuILCYvVB8hDJ3R4tYWo",
    authDomain: "firmway-message.firebaseapp.com",
    databaseURL: "https://firmway-message.firebaseio.com",
    projectId: "firmway-message",
    storageBucket: "firmway-message.appspot.com",
    messagingSenderId: "1069599747276"
  };
  firebase.initializeApp(config);
  
    const messagingUpdate = firebase.messaging();
    messagingUpdate.getToken()
    .then(function(currentToken) {
        if (currentToken) {
            if(getCookie(notification_cookie)){
                sendTokenToServer(currentToken);
            }else{
                console.log("Notification has blocked by you");
            }
        } else {
          // Show permission request.
          console.log('No Instance ID token available. Request permission to generate one.');
        }
    })
    .catch(function(err) {
        console.log('An error occurred while retrieving token. ', err);
    });
          

    function sendTokenToServer(token){
        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: base_url + '/update-fcm-token',
            data: {user_token: token},
            success: function(response) {
                console.log("User fcm token has been updated");
            },
            error: function(err){
                console.log("Error" + err);
            }
        })
    }