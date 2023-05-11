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



export default function Laporan({ userType, setUserType }) {
  const [main, setMain] = useState('View');
  const [laporan, setLaporan] = useState([]);
  const [input, setInput] = useState({});



  function setInputDefault() {
    setInput({
      unit: '',
      tanggal: '',
      jam: '',
      deskripsi: '',
      nama: '',
      status: 'Permintaan'
    });
  }

  function changeMainOnClick() {
    (main === 'View') && setMain('Input');
    (main === 'Input') && setMain('View');
  }

  function ubahDataOnClick(index) {
    console.log('ubahDataOnClick', index);
  }

  function hapusDataOnClick(index) {
    Fetch(`/laporan/delete:${index}`, 'DELETE').then(res => (res.success) && setLaporan(res.data));
  }

  function simpanOnClick(e) {
    e.preventDefault();

    Fetch('/laporan/add', 'POST', {
      ...input,
      tanggal: input.tanggal.slice(0, 10),
      jam: input.tanggal.slice(11, 16)
    }).then(res => {
      if(res.success) {
        setLaporan(res.data);
        setMain('View');
        setInputDefault();
      }
    });
  }

  useEffect(() => {
    Fetch('/laporan/getAll').then(res => (res.success) && setLaporan(res.data));
    setInputDefault();
  }, []);



  return (
    <div id='laporan-page' className='page dashboard'>
      <DashboardComponent setUserType={setUserType} />
      <div className='mainWrapper'>
        <Header />
        <main>
          <div className='title'>{(main === 'Input') && 'Tambah '}Data Laporan</div>

          {(main === 'View') && <button className='changeMainButton' onClick={changeMainOnClick}>Tambah</button>}
          {(main === 'Input') && <button className='changeMainButton' onClick={changeMainOnClick}>Kembali</button>}

          {(main === 'View') && (
            <Table
              properties={input}
              data={laporan}
              ubahDataOnClick={ubahDataOnClick}
              hapusDataOnClick={hapusDataOnClick}
            />
          )}
          {(main === 'Input') && (
            <Form
              list={[{
                key: 'unit',
                value: input.unit
              }, {
                key: 'tanggal',
                value: input.tanggal,
                type: 'datetime-local'
              }, {
                key: 'deskripsi',
                value: input.deskripsi
              }, {
                key: 'foto',
                value: input.foto,
                type: 'file'
              }, {
                key: 'nama',
                value: input.nama
              }, {
                key: 'status',
                value: input.status,
                type: 'select',
                options: ['Permintaan', 'Laporan', 'Selesai']
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
