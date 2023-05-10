// styles
import './style.css';

// components
import { Dashboard as DashboardComponent, Header } from '../../components';



export default function Dashboard() {
  return (
    <div id='dashboard-page' className='page dashboard'>
      <DashboardComponent />
      <div className='mainWrapper'>
        <Header />
        <main></main>
      </div>
    </div>
  );
};
