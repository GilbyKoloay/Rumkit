import path from 'path';
import fs from 'fs';

export default function writeFromJson(dataName, data) {
  const filePath = path.join(process.cwd(), `/database/${dataName}.json`);
  fs.writeFileSync(filePath, JSON.stringify(data));
};
