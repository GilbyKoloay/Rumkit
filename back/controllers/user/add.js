// import multer from 'multer';

// functions
import { send, readFromJson, writeToJson } from '../../functions/index.js';



// async function fileHandler(req, res, fileName) {
//   return new Promise((resolve, reject) => {
//     const storage = multer.diskStorage({
//       destination: 'database/images/user/',
//       filename: (req, file, cb) => cb(null, fileName)
//     });

//     const saveFile = multer({ storage });
//     saveFile.single('foto')(req, res, (err) => {
//       if(err) reject(err);
//       else resolve();
//     });
//   });
// }



export default function add(req, res) {
// export default async function add(req, res) {
  try {
    const originalData = readFromJson('user');
    // const fileName = `${originalData.length.toString()}.jpg`;

    // await fileHandler(req, res, fileName);
    
    const newData = [...originalData, req.body];
    // const newData = [...originalData, {...req.body, foto: fileName}];

    writeToJson('user', newData);

    send(res, 200, newData);
  }
  catch(e) {
    // console.log('error', e.message);
    send(res, 500, null, false, e.message);
  }
};
