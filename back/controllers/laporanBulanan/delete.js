// functions
import { send, readFromJson, writeToJson } from '../../functions/index.js';

export default function Delete(req, res) {
  try {
    const orginalData = readFromJson('laporanBulanan');
    const newData = orginalData.filter((item, index) => (index !== parseInt(req.params.index.slice(1))));

    writeToJson('laporanBulanan', newData);

    send(res, 200, newData);
  }
  catch(e) {
    send(res, 500, null, false, e.message);
  }
};
