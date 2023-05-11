// styles
import './style.css';

// functions
import { keyToLabel } from '../../functions';



export default function Table({
  properties,
  data=null,
  ubahDataOnClick,
  hapusDataOnClick
}) {
  return (
    <div id='table-component' className='component'>
      {(data) ? (
        <table>
          <thead>
            <tr>
              <th>No.</th>
              {Object.keys(properties).map((key, index) => (
                <th key={index}>{keyToLabel(key)}</th>
              ))}
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            {data.map((item, index) => (
              <tr key={index}>
                <td>{index+1}</td>
                {Object.keys(item).map((key, itemIndex) => (
                  <td key={itemIndex}>{item[key]}</td>
                ))}
                <td>
                  <button className='change' onClick={() => ubahDataOnClick(index)}>Ubah Data</button>
                  <button className='delete' onClick={() => hapusDataOnClick(index)}>Hapus Data</button>
                </td>
              </tr>
            ))}
          </tbody>
        </table>
      ) : (
        <div className='empty'>Data is empty</div>
      )}
    </div>
  );
};
