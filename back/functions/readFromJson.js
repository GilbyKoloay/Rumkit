import path from 'path';
import fs from 'fs';

export default function readFromJson(dataName) {
  const filePath = path.join(process.cwd(), `/database/${dataName}.json`);
  return JSON.parse(fs.readFileSync(filePath));
};
