# Firebase Cloud Messaging: Sending Push Notifications with php and javascript

### 1. Creating a Firebase Project in the Console
Url: https://console.firebase.google.com/

---

### 2. Registering the App With Firebase
Press `"Add app"` button (android, ios, webapp)<br><br>

---

### 3. Project settings
- Firebase config for clients: `Project settings` > `General` > `Your apps`

```
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.15.0/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/7.15.0/firebase-analytics.js"></script>

<script>

  // Your web app's Firebase configuration
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
  firebase.analytics();
</script>
```

- Server key to the server side

```
 Key	      Token	
 Server key   <<FCM_SERVER_KEY>>
```

---

### 4. Create topic for notifications
> "Based on the publish/subscribe model, FCM topic messaging allows you to send a message to multiple devices that have opted in to a particular topic. You compose topic messages as needed, and FCM handles routing and delivering the message reliably to the right devices."

Steps:
- Url: https://console.cloud.google.com/
- Select a project
- Select `Pub/Sub`
  - url: https://console.cloud.google.com/cloudpubsub/topic/
  - or menu: `Big Data` > `Pub/Sub` > `Topics`

---

### 5. Getting Started
- Client:
  - copy `firebase-messaging-sw.js` in the root of your domain
  - change the config (`<<FCM_API_KEY>>`, `<<FCM_AUTH_DOMAIN>>`, etc.) in `firebase-messaging-sw.js` and `client.html` files
- Server:  
  - change the `<<FCM_SERVER_KEY>>` value in the `server.php` file

---

### 6. Server Reference
> Server implementation is optional. Use the Instance ID service if you want to perform these operations:
> - Get information about app instances. Verify app tokens or get more information about the app instance that created the token.
> - Create relationship maps for app instances. Create relationships between app instances and entities such as FCM or GCM topics.
> - Create registration tokens for APNs tokens. This API lets you bulk import existing APNs tokens, mapping them to valid registration tokens for FCM or GCM.
> - Manage registration tokens for push subscriptions. For web applications implemented using the Push API, import your existing push subscriptions, mapping them to valid registration tokens for FCM.

- Get information about app instances
  - Request: `GET`
  - Url: `https://iid.googleapis.com/iid/info/<<IID_TOKEN>>`
  - Headers:
    - Key: `Authorization`
    - Value: `key=<<FCM_SERVER_KEY>>`

- Create a relation mapping for an app instance
  - Request: `POST`
  - Url: ` https://iid.googleapis.com/iid/v1/<<IID_TOKEN>>/rel/topics/<<TOPIC_NAME>>`
  - Headers:
    - Key: `Authorization`
    - Value: `key=<<FCM_SERVER_KEY>>`

--- 

### 7. Useful pages
- [Firebase (console)](https://console.firebase.google.com/)
- [Fireabase (github)](https://github.com/firebase)
- [Firebase (docs)](https://firebase.google.com/docs/)
- [Firebase cloud messaging (docs)](https://firebase.google.com/docs/cloud-messaging)
- [Firebase live (youtbe channel)](https://www.youtube.com/channel/UCP4bf6IHJJQehibu6ai__cg)
- [Firebase Admin SDK for PHP (github)](https://github.com/kreait/firebase-php/blob/master/docs/index.rst)
- [Firebase Admin SDK for PHP (docs)](https://firebase-php.readthedocs.io/en/latest/index.html)
- [What is Instance ID? (Google developers)](https://developers.google.com/instance-id)
- [Instance ID > Server Reference](https://developers.google.com/instance-id/reference/server)
- [Web Push Book](https://web-push-book.gauntface.com/)
- [Web fundamentals - Adding Push Notifications to a Web App
](https://developers.google.com/web/fundamentals/codelabs/push-notifications)
- [PHP-FCM Documentation](https://php-fcm.readthedocs.io/en/latest/)