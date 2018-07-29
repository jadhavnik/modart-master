 
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
  
  const messaging = firebase.messaging();
