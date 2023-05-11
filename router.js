import express from 'express';

// controllers - user
import userGetAll from './controllers/user/getAll.js';
import userAdd from './controllers/user/add.js';
import userDelete from './controllers/user/delete.js';



const router = express.Router();



// user
router.get('/user/getAll', userGetAll);
router.post('/user/add', userAdd);
router.delete('/user/delete:index', userDelete);



export default router;
