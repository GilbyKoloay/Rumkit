import express from 'express';
import cors from 'cors';
import bodyParser from 'body-parser';

// router
import router from './router.js';

// functions
import { send } from './functions/index.js';



const app = express();



// MIDDLEWARES

// cors
app.use(cors());

// body parser to get body from requests
app.use(bodyParser.urlencoded({extended: false}));
app.use(bodyParser.json());



// using routes
app.use('/api', router);


// 404 handler
app.use((req, res) => {
  send(res, 404, null, 'Endpoint not found');
});



// open server
const PORT = 3001;
app.listen(PORT, () => {
  console.log(`Server is running on port ${PORT}.`);
});
