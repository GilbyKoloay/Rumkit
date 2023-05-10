// functions
import { send, readFromJson } from '../../functions/index.js';

export default function getAll(req, res) {
  try {
    const data = readFromJson('user');

    send(res, 200, data);
  }
  catch(e) {
    send(res, 500, null, false, e.message);
  }
};
