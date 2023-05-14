import { useState } from 'react';
import { useNavigate } from 'react-router-dom';

// styles
import './style.css';

// component
import { Input } from '../../components';

// functions
import { Fetch, encrypt } from '../../functions';

// images
import { Login as LoginImage } from '../../assets/images';



export default function Login({ setUserType }) {
  const navigate = useNavigate();

  const [user, setUser] = useState('');
  const [password, setPassword] = useState('');
  const [loginErrorMessage, setLoginErrorMessage] = useState(false);



  function loginOnClick(e) {
    e.preventDefault();

    Fetch('/login', 'POST', {
      username: user,
      password: encrypt(password)
    }).then(res => {
      if(res.success) {
        setUserType(res.data);
        navigate('/dashboard');
      }
      else {
        setLoginErrorMessage(res.desc);
      }
    });
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
        <div className='loginErrorMessage'>
          <div>{loginErrorMessage}</div>
        </div>
        <button type='submit' onClick={e => loginOnClick(e)}>LOGIN</button>
      </form>
    </div>
  );
};
