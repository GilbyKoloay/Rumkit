import { useState, useEffect } from 'react';

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
  const [main, setMain] = useState('view');
  const [laporan, setLaporan] = useState([]);
  const [input, setInput] = useState(null);
  const [changeIndex, setChangeIndex] = useState(null);
  const [change, setChange] = useState(null);



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

  function ubahDataOnClick(index) {
    setChangeIndex(index);
    setChange(laporan[index]);
    setMain('change');
  }

  function hapusDataOnClick(index) {
    Fetch(`/laporan/delete:${index}`, 'DELETE').then(res => (res.success) && setLaporan(res.data));
  }

  function tambahOnClick(e) {
    e.preventDefault();

    Fetch('/laporan/add', 'POST', {
      ...input,
      tanggal: input.tanggal.slice(0, 10),
      jam: input.tanggal.slice(11, 16)
    }).then(res => {
      if(res.success) {
        setLaporan(res.data);
        setMain('view');
        setInputDefault();
      }
    });
  }

  function ubahOnClick(e) {
    e.preventDefault();

    Fetch(`/laporan/change:${changeIndex}`, 'PATCH', {
      ...change,
      tanggal: change.tanggal.slice(0, 10),
      jam: change.tanggal.slice(11, 16)
    }).then(res => {
      if(res.success) {
        setLaporan(res.data);
        setMain('view');
        setChangeIndex(null);
        setChange(null);
      }
    });
  }

  useEffect(() => {
    Fetch('/laporan/getAll').then(res => (res.success) && setLaporan(res.data));
    setInputDefault();
  }, []);



  return (
    <div id='laporan-page' className='page dashboard'>
      <DashboardComponent userType={userType} setUserType={setUserType} />
      <div className='mainWrapper'>
        <Header />
        <main>
          <div className='title'>{(main === 'input') ? 'Tambah ' : (main === 'change') && 'Ubah '}Data Laporan</div>

          {(main === 'view') && <button className='changeMainButton' onClick={() => setMain('input')}>Tambah</button>}
          {(main !== 'view') && <button className='changeMainButton' onClick={() => setMain('view')}>Kembali</button>}

          {(main === 'view') ? (
            <Table
              userType={userType}
              properties={input}
              data={laporan}
              ubahDataOnClick={ubahDataOnClick}
              hapusDataOnClick={hapusDataOnClick}
            />
          ) : (
            <Form
              list={[{
                key: 'unit',
                value: (main === 'input') ? input.unit : (main === 'change') && change.unit
              }, {
                key: 'tanggal',
                value: (main === 'input') ? input.tanggal : (main === 'change') && `${change.tanggal}T${change.jam}`,
                type: 'datetime-local'
              }, {
                key: 'deskripsi',
                value: (main === 'input') ? input.deskripsi : (main === 'change') && change.deskripsi
              }, {
                key: 'foto',
                value: (main === 'input') ? input.foto : (main === 'change') && change.foto,
                type: 'file'
              }, {
                key: 'nama',
                value: (main === 'input') ? input.nama : (main === 'change') && change.nama
              }, {
                key: 'status',
                value: (main === 'input') ? input.status : (main === 'change') && change.status,
                type: 'select',
                options: ['Permintaan', 'Laporan', 'Selesai']
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
