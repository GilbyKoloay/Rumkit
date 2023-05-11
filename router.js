import express from 'express';

// controllers - user
import userGetAll from './controllers/user/getAll.js';
import userAdd from './controllers/user/add.js';
import userDelete from './controllers/user/delete.js';

// controllers - laporan
import laporanGetAll from './controllers/laporan/getAll.js';
import laporanAdd from './controllers/laporan/add.js';
import laporanDelete from './controllers/laporan/delete.js';



const router = express.Router();



// user
router.get('/user/getAll', userGetAll);
router.post('/user/add', userAdd);
router.delete('/user/delete:index', userDelete);

// laporan
router.get('/laporan/getAll', laporanGetAll);
router.post('/laporan/add', laporanAdd);
router.delete('/laporan/delete:index', laporanDelete);



export default router;
