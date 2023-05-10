import { BrowserRouter, Routes, Route } from 'react-router-dom';

// pages
import {
  Login,
  Dashboard,
  User,
  Laporan,
  LaporanHarian,
  LaporanBulanan,
  NotFound
} from './pages';



export default function App() {
  return (
    <BrowserRouter>
      <Routes>
        {/* dev */} <Route path='/' element={<Login />} />
        
        <Route path='/login' element={<Login />} />
        <Route path='/dashboard' element={<Dashboard />} />
        <Route path='/user' element={<User />} />
        <Route path='/laporan' element={<Laporan />} />
        <Route path='/laporan-harian' element={<LaporanHarian />} />
        <Route path='/laporan-bulanan' element={<LaporanBulanan />} />
        <Route path='*' element={<NotFound />} />
      </Routes>
    </BrowserRouter>
  );
};
