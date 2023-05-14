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



export default function Depan({ userType }) {
  const [main, setMain] = useState('view');
  const [laporan, setLaporan] = useState([]);
  const [input, setInput] = useState(null);



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

  useEffect(() => {
    Fetch('/laporan/getAll').then(res => (res.success) && setLaporan(res.data));
    setInputDefault();
  }, []);



  return (
    <div id='laporan-page' className='page dashboard'>
      <DashboardComponent userType={userType} />
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
            />
          ) : (
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
                value: input.nama,
              }]}
              onChange={(key, value) => setInput({...input, [key]: value})}
              buttonLabel='Tambah'
              buttonOnClick={value => tambahOnClick(value)}
            />
          )}
        </main>
      </div>
    </div>
  );
};
