import { useState } from 'react';
import {
  BrowserRouter,
  Routes,
  Route,
  Navigate
} from 'react-router-dom';

// pages
import {
  Depan,
  Login,
  Dashboard,
  User,
  Laporan,
  LaporanHarian,
  LaporanBulanan
} from './pages';



export default function App() {
  const [userType, setUserType] = useState('visitor');



  return (
    <BrowserRouter>
      <Routes>
        <Route path='/login' element={<Login setUserType={setUserType} />} />
        <Route path='/dashboard' element={<Dashboard userType={userType} setUserType={setUserType} />} />
        {(userType !== 'visitor') ? (
          <>
            <Route path='*' element={<Navigate to='/dashboard' />} />
            <Route path='/user' element={<User userType={userType} setUserType={setUserType} />} />
            <Route path='/laporan' element={<Laporan userType={userType} setUserType={setUserType} />} />
            <Route path='/laporan-harian' element={<LaporanHarian userType={userType} setUserType={setUserType} />} />
            <Route path='/laporan-bulanan' element={<LaporanBulanan userType={userType} setUserType={setUserType} />} />
          </>
        ) : (
          <>
            <Route path='*' element={<Navigate to='/depan' />} />
            <Route path='/depan' element={<Depan userType='visitor' />} />
          </>
        )}
      </Routes>
    </BrowserRouter>
  );
};
