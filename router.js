import express from 'express';

// login
import login from './controllers/login/login.js';

// user
import userGetAll from './controllers/user/getAll.js';
import userAdd from './controllers/user/add.js';
import userDelete from './controllers/user/delete.js';

// laporan
import laporanGetAll from './controllers/laporan/getAll.js';
import laporanAdd from './controllers/laporan/add.js';
import laporanDelete from './controllers/laporan/delete.js';

// laporanHarian
import laporanHarianGetAll from './controllers/laporanHarian/getAll.js';
import laporanHarianAdd from './controllers/laporanHarian/add.js';
import laporanHarianDelete from './controllers/laporanHarian/delete.js';

// laporanBulanan
import laporanBulananGetAll from './controllers/laporanBulanan/getAll.js';
import laporanBulananAdd from './controllers/laporanBulanan/add.js';
import laporanBulananDelete from './controllers/laporanBulanan/delete.js';



const router = express.Router();



// login
router.post('/login', login);

// user
router.get('/user/getAll', userGetAll);
router.post('/user/add', userAdd);
router.delete('/user/delete:index', userDelete);

// laporan
router.get('/laporan/getAll', laporanGetAll);
router.post('/laporan/add', laporanAdd);
router.delete('/laporan/delete:index', laporanDelete);

// laporanHarian
router.get('/laporanHarian/getAll', laporanHarianGetAll);
router.post('/laporanHarian/add', laporanHarianAdd);
router.delete('/laporanHarian/delete:index', laporanHarianDelete);

// laporanBulanan
router.get('/laporanBulanan/getAll', laporanBulananGetAll);
router.post('/laporanBulanan/add', laporanBulananAdd);
router.delete('/laporanBulanan/delete:index', laporanBulananDelete);



export default router;
