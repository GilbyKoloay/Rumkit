// styles
import './style.css';

// components
import { Dashboard as DashboardComponent, Header } from '../../components';



export default function Dashboard({ userType, setUserType }) {
  return (
    <div id='dashboard-page' className='page dashboard'>
      <DashboardComponent setUserType={setUserType} />
      <div className='mainWrapper'>
        <Header />
        <main></main>
      </div>
    </div>
  );
};
