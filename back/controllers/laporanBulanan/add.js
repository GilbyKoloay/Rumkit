// functions
import { send, readFromJson, writeToJson } from '../../functions/index.js';

export default function add(req, res) {
  try {
    const originalData = readFromJson('laporanBulanan');
    const newData = [...originalData, req.body];

    writeToJson('laporanBulanan', newData);

    send(res, 200, newData);
  }
  catch(e) {
    send(res, 500, null, false, e.message);
  }
};
