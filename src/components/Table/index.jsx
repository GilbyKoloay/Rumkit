// styles
import './style.css';



export default function Table({ title='<table title>', tambahOnClick=() => console.log('<tambah onClick>') }) {
  return (
    <div id='table-component' className='component'>
      <div className='title'>{title}</div>
      <button className='tambahButton' onClick={tambahOnClick}>Tambah</button>

      <table>
        
      </table>
    </div>
  );
};
