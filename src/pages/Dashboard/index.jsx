// styles
import './style.css';

// components
import { Dashboard as DashboardComponent, Header, Table } from '../../components';



export default function Dashboard() {
  function tambahOnClick() {
    console.log('hello world');
  }



  return (
    <div id='dashboard-page' className='page pageDashboard'>
      <DashboardComponent />
      <main>
        <Header />
        <Table title='Data User' tambahOnClick={tambahOnClick} />
      </main>
    </div>
  );
};
