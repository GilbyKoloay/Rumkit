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



export default function LaporanBulanan({ userType, setUserType }) {
  const [main, setMain] = useState('view');
  const [laporanBulanan, setLaporanBulanan] = useState([]);
  const [input, setInput] = useState(null);
  const [changeIndex, setChangeIndex] = useState(null);
  const [change, setChange] = useState(null);



  function setInputDefault() {
    setInput({
      deskripsi: '',
      nama: ''
    });
  }

  function ubahDataOnClick(index) {
    setChangeIndex(index);
    setChange(laporanBulanan[index]);
    setMain('change');
  }

  function hapusDataOnClick(index) {
    Fetch(`/laporanBulanan/delete:${index}`, 'DELETE').then(res => (res.success) && setLaporanBulanan(res.data));
  }

  function tambahOnClick(e) {
    e.preventDefault();

    Fetch('/laporanBulanan/add', 'POST', input).then(res => {
      if(res.success) {
        setLaporanBulanan(res.data);
        setMain('view');
        setChangeIndex(null);
        setChange(null);
      }
    });
  }

  function ubahOnClick(e) {
    e.preventDefault();

    Fetch(`/laporanBulanan/change:${changeIndex}`, 'PATCH', change).then(res => {
      if(res.success) {
        setLaporanBulanan(res.data);
        setMain('view');
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
      <DashboardComponent setUserType={setUserType} />
      <div className='mainWrapper'>
        <Header />
        <main>
          <div className='title'>{(main === 'input') ? 'Tambah ' : (main === 'change') && 'Ubah '}Data Laporan Bulanan</div>

          {(main === 'view') && <button className='changeMainButton' onClick={() => setMain('input')}>Tambah</button>}
          {(main !== 'view') && <button className='changeMainButton' onClick={() => setMain('view')}>Kembali</button>}

          {(main === 'view') ? (
            <Table
              userType={userType}
              properties={input}
              data={laporanBulanan}
              ubahDataOnClick={ubahDataOnClick}
              hapusDataOnClick={hapusDataOnClick}
            />
          ) : (
            <Form
              list={[{
                key: 'deskripsi',
                value: (main === 'input') ? input.deskripsi : (main === 'change') && change.deskripsi
              }, {
                key: 'nama',
                value: (main === 'input') ? input.nama : (main === 'change') && change.nama
              }]}
              onChange={(key, value) => {
                (main === 'input') ? setInput({...input, [key]: value}) :
                (main === 'change') && setChange({...change, [key]: value})
              }}
              buttonLabel={(main === 'input') ? 'Tambah' : (main === 'change') && 'Ubah'}
              buttonOnClick={value => (main === 'input') ? tambahOnClick(value) : (main === 'change') && ubahOnClick(value)}
            />
          )}
        </main>
      </div>
    </div>
  );
};
