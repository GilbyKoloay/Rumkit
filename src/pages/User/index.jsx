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



export default function User() {
  const [main, setMain] = useState('View');
  const [user, setUser] = useState([]);
  const [input, setInput] = useState({});



  function setInputDefault() {
    setInput({
      username: '',
      password: '',
      nama: '',
      level: 'Admin',
      foto: ''
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
    Fetch(`/user/delete:${index}`, 'DELETE').then(res => (res.success) && setUser(res.data));
  }

  function simpanOnClick(e) {
    e.preventDefault();

    Fetch('/user/add', 'POST', input).then(res => {
      if(res.success) {
        setUser(res.data);
        setMain('View');
        setInputDefault();
      }
    });
  }

  useEffect(() => {
    Fetch('/user/getAll').then(res => (res.success) && setUser(res.data));
    setInputDefault();
  }, []);



  return (
    <div id='user-page' className='page dashboard'>
      <DashboardComponent />
      <div className='mainWrapper'>
        <Header />
        <main>
          <div className='title'>Data User</div>

          {(main === 'View') && <button className='changeMainButton' onClick={changeMainOnClick}>Tambah</button>}
          {(main === 'Input') && <button className='changeMainButton' onClick={changeMainOnClick}>Kembali</button>}

          {(main === 'View') && (
            <Table
              properties={input}
              data={user}
              ubahDataOnClick={ubahDataOnClick}
              hapusDataOnClick={hapusDataOnClick}
            />
          )}
          {(main === 'Input') && (
            <Form
              list={[{
                key: 'username',
                value: input.username
              }, {
                key: 'password',
                value: input.password,
                type: 'password'
              }, {
                key: 'nama',
                value: input.nama
              }, {
                key: 'level',
                value: input.level,
                type: 'select',
                options: ['Admin', 'User']
              }, {
                key: 'foto',
                value: input.foto,
                type: 'file'
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
