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
import { Fetch, encrypt } from '../../functions';



export default function User({ userType, setUserType }) {
  const [main, setMain] = useState('view');
  const [user, setUser] = useState([]);
  const [input, setInput] = useState(null);
  const [changeIndex, setChangeIndex] = useState(null);
  const [change, setChange] = useState(null);



  function setInputDefault() {
    setInput({
      username: '',
      password: '',
      nama: '',
      level: 'Admin',
      foto: ''
    });
  }

  function ubahDataOnClick(index) {
    setChangeIndex(index);
    setChange(user[index]);
    setMain('change');
  }

  function hapusDataOnClick(index) {
    Fetch(`/user/delete:${index}`, 'DELETE').then(res => (res.success) && setUser(res.data));
  }

  function tambahOnClick(e) {
    e.preventDefault();

    Fetch('/user/add', 'POST', {...input, password: encrypt(input.password)}).then(res => {
      if(res.success) {
        setUser(res.data);
        setMain('view');
        setInputDefault();
      }
    });
  }

  function ubahOnClick(e) {
    e.preventDefault();

    Fetch(`/user/change:${changeIndex}`, 'PATCH', {...change, password: encrypt(change.password)}).then(res => {
      if(res.success) {
        setUser(res.data);
        setMain('view');
        setChangeIndex(null);
        setChange(null);
      }
    });
  }

  useEffect(() => {
    Fetch('/user/getAll').then(res => (res.success) && setUser(res.data));
    setInputDefault();
  }, []);



  return (
    <div id='user-page' className='page dashboard'>
      <DashboardComponent setUserType={setUserType} />
      <div className='mainWrapper'>
        <Header />
        <main>
          <div className='title'>{(main === 'input') ? 'Tambah ' : (main === 'change') && 'Ubah '}Data User</div>

          {(main === 'view') && <button className='changeMainButton' onClick={() => setMain('input')}>Tambah</button>}
          {(main !== 'view') && <button className='changeMainButton' onClick={() => setMain('view')}>Kembali</button>}

          {(main === 'view') ? (
            <Table
              userType={userType}
              properties={input}
              data={user}
              ubahDataOnClick={ubahDataOnClick}
              hapusDataOnClick={hapusDataOnClick}
            />
          ) : (
            <Form
              list={[{
                key: 'username',
                value: (main === 'input') ? input.username : (main === 'change') && change.username
              }, {
                key: 'password',
                value: (main === 'input') ? input.password : (main === 'change') && change.password,
                type: 'password'
              }, {
                key: 'nama',
                value: (main === 'input') ? input.nama : (main === 'change') && change.nama
              }, {
                key: 'level',
                value: (main === 'input') ? input.level : (main === 'change') && change.level,
                type: 'select',
                options: ['Admin', 'User']
              }, {
                key: 'foto',
                value: (main === 'input') ? input.foto : (main === 'change') && change.foto,
                type: 'file'
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
