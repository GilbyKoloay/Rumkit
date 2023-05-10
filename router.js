import express from 'express';

// controllers - user
import userGetAll from './controllers/user/getAll.js';
import userAdd from './controllers/user/add.js';



const router = express.Router();



// user
router.get('/user/getAll', userGetAll);
router.post('/user/add', userAdd);



export default router;
