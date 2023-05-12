import { useNavigate } from 'react-router-dom';

// styles
import './style.css';

// images
import { Dashboard as DashboardImage } from '../../assets/images';

// icons
import { Home } from '../../assets/icons';



export default function Dashboard({ setUserType }) {
  const navigate = useNavigate();



  function dashboardOnClick() {
    navigate('/dashboard');
  }

  function userOnClick() {
    navigate('/user');
  }

  function laporanOnClick() {
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



  return (
    <div id='dashboard-component' className='component'>
      <img src={DashboardImage} alt='dashboard' />
      
      <div className='dashboardButton button' onClick={dashboardOnClick}>
        <img src={DashboardImage} alt='icon' />
        <div className='text'>Dashboard</div>
      </div>

      <div className='button' onClick={userOnClick}>User</div>
      <div className='button' onClick={laporanOnClick}>Laporan</div>
      <div className='button' onClick={laporanHarianOnClick}>Laporan Harian</div>
      <div className='button' onClick={laporanBulananOnClick}>Laporan Bulanan</div>

      <div className='exitButton button' onClick={signOutOnClick}>Sign Out</div>
    </div>
  );
};
