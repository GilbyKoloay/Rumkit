// functions
import { send, readFromJson, writeToJson } from '../../functions/index.js';

export default function change(req, res) {
  try {
    const orginalData = readFromJson('laporanHarian');
    const newData = orginalData.map((item, index) => {
      if(index === parseInt(req.params.index.slice(1))) return req.body;
      else return item;
    });

    writeToJson('laporanHarian', newData);

    send(res, 200, newData);
  }
  catch(e) {
    send(res, 500, null, false, e.message);
  }
};
