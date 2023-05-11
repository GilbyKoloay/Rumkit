import { useState } from 'react';

// styles
import './style.css';

// components
import {
  Dashboard as DashboardComponent,
  Header,
  Table,
  Form
} from '../../components';



export default function LaporanHarian() {
  const [main, setMain] = useState('View');



  function changeMainOnClick() {
    console.log('pressed', main);
    (main === 'View') && setMain('Input');
    (main === 'Input') && setMain('View');
  }



  return (
    <div id='laporanHarian-page' className='page dashboard'>
      <DashboardComponent />
      <div className='mainWrapper'>
        <Header />
        <main>
          <div className='title'>Data Laporan Harian</div>

          {(main === 'View') && <button className='changeMainButton' onClick={changeMainOnClick}>Tambah</button>}
          {(main === 'Input') && <button className='changeMainButton' onClick={changeMainOnClick}>Kembali</button>}

          {(main === 'View') && <Table />}
          {(main === 'Input') && <Form />}
        </main>
      </div>
    </div>
  );
};