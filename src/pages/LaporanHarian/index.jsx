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



export default function LaporanHarian({ userType, setUserType }) {
  const [main, setMain] = useState('View');
  const [laporanHarian, setLaporanHarian] = useState([]);
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
    Fetch(`/laporanHarian/delete:${index}`, 'DELETE').then(res => (res.success) && setLaporanHarian(res.data));
  }

  function simpanOnClick(e) {
    e.preventDefault();

    Fetch('/laporanHarian/add', 'POST', input).then(res => {
      if(res.success) {
        setLaporanHarian(res.data);
        setMain('View');
        setInputDefault();
      }
    });
  }

  useEffect(() => {
    Fetch('/laporanHarian/getAll').then(res => (res.success) && setLaporanHarian(res.data));
    setInputDefault();
  }, []);



  return (
    <div id='laporanHarian-page' className='page dashboard'>
      <DashboardComponent setUserType={setUserType} />
      <div className='mainWrapper'>
        <Header />
        <main>
          <div className='title'>{(main === 'Input') && 'Tambah '}Data Laporan Harian</div>

          {(main === 'View') && <button className='changeMainButton' onClick={changeMainOnClick}>Tambah</button>}
          {(main === 'Input') && <button className='changeMainButton' onClick={changeMainOnClick}>Kembali</button>}

          {(main === 'View') && (
            <Table
              properties={input}
              data={laporanHarian}
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
