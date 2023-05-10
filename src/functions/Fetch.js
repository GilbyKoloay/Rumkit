const PORT = 3001;



export default async function Fetch(url, method='GET', body=null) {
  const init = {
    method,
    headers: {'Content-type': 'application/json'}
  };

  if(body !== null) init.body = JSON.stringify(body);
  
  try {
    const req = await fetch(`http://localhost:${PORT}/api${url}`, init);
    const res = await req.json();
    return res;
  }
  catch(e) {
    console.log('Unable to fetch. ', e.message);
  }
};
