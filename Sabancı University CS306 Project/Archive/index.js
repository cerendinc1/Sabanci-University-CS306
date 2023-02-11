const express = require('express');
const app = express();
const PORT = 3000;
const { v4: uuidv4 } = require('uuid');

// Import the functions you need from the SDKs you need
const { initializeApp } = require("firebase/app");
const { getDatabase, ref, set, onValue, get } = require("firebase/database");
const firebaseConfig = {
  apiKey: "AIzaSyBgNRKSu7k9siEP6Cnuybgn45RxtXhylkY",
  authDomain: "cero-sera.firebaseapp.com",
  databaseURL: "https://cero-sera-default-rtdb.firebaseio.com",
  projectId: "cero-sera",
  storageBucket: "cero-sera.appspot.com",
  messagingSenderId: "514103869063",
  appId: "1:514103869063:web:f71f16895a85274e9cc222",
  measurementId: "G-Y4SCELW9FB"
};
/*
Conversation:
{
    subject: "Konu"
    messages: [],
    status: 'active,
    lastMessage: 0
}

Message:
{
    sender: "alper",
    content: "Merhaba"
    time: 12412312
}
*/

// Initialize Firebase
const fbApp = initializeApp(firebaseConfig);
const db = getDatabase(fbApp);

app.use(express.json());
app.use(express.urlencoded({ extended: true }));

app.get('/create', async (req, res) => {
    res.sendFile(__dirname + '/view/create.html');
});

app.get('/conversation/:id', async (req, res) => {
    res.sendFile(__dirname + '/view/conversation.html');
});

app.get('/admin/conversation/:id', async (req, res) => {
    res.sendFile(__dirname + '/view/admin-convo.html');
});



app.post('/create', async (req, res) => {
    const id = uuidv4();

    const {subject, name, message} = req.body;
    console.log({subject, name, message});

    const conversation = ref(db, 'conversations/' + id);
    set(conversation, {
        subject: subject,
        messages: [
            {
                sender: name,
                content: message,
                time: Date.now()
            }
        ],
        status: 'active',
        lastMessage: Date.now()
    });
    res.send({id});
});

app.post('/send', async (req, res) => {
    const {id, name, message} = req.body;
    console.log({id, name, message});

    const conversation = ref(db, 'conversations/' + id);
    get(conversation).then((snapshot) => {
        if(snapshot.exists()){
            const data = snapshot.val();
            data.messages.push({
                sender: name,
                content: message,
                time: Date.now()
            });
            data.lastMessage = Date.now();
            set(conversation, data);
            return res.send('OK');
        }
        return res.send('NOT OK');
    });
});



app.get('/get-conversation/:id', async (req, res) => {
    if(!req.params.id) return res.send('YOK');

    const conversation = ref(db, 'conversations/' + req.params.id);
    get(conversation).then((snapshot) => {
        if (snapshot.exists()) {
          return res.send(snapshot.val());
        }
        return res.send('NOT OK');
    }).catch((error) => {
        return res.send('NOT OK');
    });
});

app.listen(PORT, () => {
    console.log("Server running on port " + PORT);
});

