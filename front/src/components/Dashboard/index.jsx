import { useNavigate } from 'react-router-dom';

// styles
import './style.css';

// images
import { Dashboard as DashboardImage } from '../../assets/images';



export default function Dashboard({ userType='visitor', setUserType }) {
  const navigate = useNavigate();



  function dashboardOnClick() {
    navigate('/dashboard');
  }

  function userOnClick() {
    navigate('/user');
  }

  function notVisitorlaporanOnClick() {
    navigate('/laporan');
  }

  function laporanHarianOnClick() {
    navigate('/laporan-harian');
  }

  function laporanBulananOnClick() {
    navigate('/laporan-bulanan');
  }

  function signOutOnClick() {
    setUserType(null);
    navigate('/login');
  }

  function visitorLaporanOnClick() {
    navigate('/depan');
  }

  function signInOnClick() {
    navigate('/login');
  }



  return (
    <div id='dashboard-component' className='component'>
      <img src={DashboardImage} alt='dashboard' />
      
      <div className='dashboardButton button' onClick={dashboardOnClick}>
        <img src={DashboardImage} alt='icon' />
        <div className='text'>Dashboard</div>
      </div>

      {(userType !== 'visitor') ? (
        <>
          <div className='button' onClick={userOnClick}>User</div>
          <div className='button' onClick={notVisitorlaporanOnClick}>Laporan</div>
          <div className='button' onClick={laporanHarianOnClick}>Laporan Harian</div>
          <div className='button' onClick={laporanBulananOnClick}>Laporan Bulanan</div>
          <div className='signButton button' onClick={signOutOnClick}>Sign Out</div>
        </>
      ) : (
        <>
          <div className='button' onClick={visitorLaporanOnClick}>Laporan</div>
          <div className='signButton button' onClick={signInOnClick}>Sign In</div>
        </>
      )}
    </div>
  );
};
