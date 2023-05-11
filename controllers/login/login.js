// functions
import { send, readFromJson } from '../../functions/index.js';



export default function login(req, res) {
  try {
    const { username, password } = req.body;
    const data = readFromJson('user');

    let isUsernameExist = false;
    let isPasswordTrue = false;
    let userType = null;

    data.forEach(thisUsername => {
      if(username === thisUsername.username) {
        isUsernameExist = true;
        data.forEach((thisPassword, index) => {
          if(password === thisPassword.password) {
            isPasswordTrue = true;
            userType = thisPassword.level;
          };
        });
      }
    });

    if(!isUsernameExist) send(res, 404, null, false, 'Username not found.');
    else if(!isPasswordTrue) send(res, 404, null, false, 'Wrong password.');
    else send(res, 200, userType);
  }
  catch(e) {
    send(res, 500, null, false, e.message);
  }
};
