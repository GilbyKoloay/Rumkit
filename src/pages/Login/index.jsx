import { useState } from 'react';
import { useNavigate } from 'react-router-dom';

// styles
import './style.css';

// component
import { Input } from '../../components';

// images
import { Login as LoginImage } from '../../assets/images';



export default function Login() {
  const navigate = useNavigate();

  const [user, setUser] = useState('');
  const [password, setPassword] = useState('');



  function loginOnClick(e) {
    e.preventDefault();

    navigate('/dashboard');
  }



  return (
    <div id='login-page' className='page'>
      <form>
        <img src={LoginImage} alt='login' />
        <Input placeholder='User Login' value={user} onChange={setUser} />
        <Input
          placeholder='Password'
          type='password'
          value={password}
          onChange={setPassword}
        />
        <button type='submit' onClick={e => loginOnClick(e)}>LOGIN</button>
      </form>
    </div>
  );
};
