import { useState, useEffect } from 'react';
import {
  BrowserRouter,
  Routes,
  Route,
  Navigate
} from 'react-router-dom';

// pages
import {
  Login,
  Dashboard,
  User,
  Laporan,
  LaporanHarian,
  LaporanBulanan
} from './pages';



export default function App() {
  const [userType, setUserType] = useState(null);

  useEffect(() => {
    console.log('userType', userType);
  });



  return (
    <BrowserRouter>
      <Routes>
        <Route path='/login' element={<Login setUserType={setUserType} />} />
        {(userType) ? (
          <>
            <Route path='*' element={<Navigate to='/dashboard' />} />
            <Route path='/dashboard' element={<Dashboard userType={userType} setUserType={setUserType} />} />
            <Route path='/user' element={<User userType={userType} setUserType={setUserType} />} />
            <Route path='/laporan' element={<Laporan userType={userType} setUserType={setUserType} />} />
            <Route path='/laporan-harian' element={<LaporanHarian userType={userType} setUserType={setUserType} />} />
            <Route path='/laporan-bulanan' element={<LaporanBulanan userType={userType} setUserType={setUserType} />} />
          </>
        ) : (
          <>
            <Route path='*' element={<Navigate to='/login' />} />
          </>
        )}
      </Routes>
    </BrowserRouter>
  );
};
