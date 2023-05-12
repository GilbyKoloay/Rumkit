// import CryptoJS from 'crypto-js';

// const key = 'secret';
const key = 69;



export function encrypt(string) {
  // return CryptoJS.AES.encrypt(string, key).toString();

  let encryptedString = '';

  for(let count=0; count<string.length; count++) {
    const charCode = string.charCodeAt(count);
    const shiftedCode = (charCode - 65 + key) % 26 + 65;
    encryptedString += String.fromCharCode(shiftedCode);
  }

  return encryptedString;
};

export function decrypt(string) {
  // return CryptoJS.AES.decrypt(string, key).toString(CryptoJS.enc.Utf8);

  let decryptedString = '';

  for(let count=0; count<string.length; count++) {
    const charCode = string.charCodeAt(count);
    const shiftedCode = (charCode - 65 - key + 26) % 26 + 65;
    decryptedString += String.fromCharCode(shiftedCode);
  }
  
  return decryptedString;
};
