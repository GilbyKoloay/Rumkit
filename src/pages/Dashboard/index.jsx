// styles
import './style.css';

// components
import { Dashboard as DashboardComponent, Header, Table } from '../../components';



export default function Dashboard() {
  return (
    <div id='dashboard-page' className='page pageDashboard'>
      <DashboardComponent />
      <main>
        <Header />
        <Table />
      </main>
    </div>
  );
};
