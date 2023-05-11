// styles
import './style.css';

// functions
import { keyToLabel } from '../../functions';



export default function Table({
  properties,
  data=[],
  ubahDataOnClick,
  hapusDataOnClick
}) {
  return (
    <div id='table-component' className='component'>
      {(data.length > 0) ? (
        <table>
          <thead>
            <tr>
              <th>No.</th>
              {Object.keys(properties).map((key, index) => (
                (key !== 'password') && <th key={index}>{keyToLabel(key)}</th>
              ))}
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            {data.map((item, index) => (
              <tr key={index}>
                <td>{index+1}</td>
                {Object.keys(item).map((key, itemIndex) => (
                  (key !== 'password') && <td key={itemIndex}>{item[key]}</td>
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
