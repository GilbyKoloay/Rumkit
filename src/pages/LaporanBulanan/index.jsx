import { useState, useEffect } from 'react';

// styles
import './style.css';

// components
import {
  Dashboard as DashboardComponent,
  Header,
  Table,
  Form
} from '../../components';

// functions
import { Fetch } from '../../functions';



export default function LaporanBulanan() {
  const [main, setMain] = useState('View');
  const [laporanBulanan, setLaporanBulanan] = useState([]);
  const [input, setInput] = useState({});



  function setInputDefault() {
    setInput({
      deskripsi: '',
      nama: ''
    });
  }
  
  function changeMainOnClick() {
    console.log('pressed', main);
    (main === 'View') && setMain('Input');
    (main === 'Input') && setMain('View');
  }

  function ubahDataOnClick(index) {
    console.log('ubahDataOnClick', index);
  }

  function hapusDataOnClick(index) {
    Fetch(`/laporanBulanan/delete:${index}`, 'DELETE').then(res => (res.success) && setLaporanBulanan(res.data));
  }

  function simpanOnClick(e) {
    e.preventDefault();

    Fetch('/laporanBulanan/add', 'POST', input).then(res => {
      if(res.success) {
        setLaporanBulanan(res.data);
        setMain('View');
        setInputDefault();
      }
    });
  }

  useEffect(() => {
    Fetch('/laporanBulanan/getAll').then(res => (res.success) && setLaporanBulanan(res.data));
    setInputDefault();
  }, []);



  return (
    <div id='laporanBulanan-page' className='page dashboard'>
      <DashboardComponent />
      <div className='mainWrapper'>
        <Header />
        <main>
          <div className='title'>{(main === 'Input') && 'Tambah '}Data Laporan Bulanan</div>

          {(main === 'View') && <button className='changeMainButton' onClick={changeMainOnClick}>Tambah</button>}
          {(main === 'Input') && <button className='changeMainButton' onClick={changeMainOnClick}>Kembali</button>}

          {(main === 'View') && (
            <Table
              properties={input}
              data={laporanBulanan}
              ubahDataOnClick={ubahDataOnClick}
              hapusDataOnClick={hapusDataOnClick}
            />
          )}
          {(main === 'Input') && (
            <Form
              list={[{
                key: 'deskripsi',
                value: input.deskripsi
              }, {
                key: 'nama',
                value: input.nama
              }]}
              onChange={(key, value) => setInput({...input, [key]: value})}
              simpanOnClick={simpanOnClick}
            />
          )}
        </main>
      </div>
    </div>
  );
};
