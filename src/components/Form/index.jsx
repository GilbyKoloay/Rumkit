// styles
import './style.css';

// functions
import { keyToLabel } from '../../functions';



export default function Form({ list=null, onChange=value => console.log(`<form onChange=${value}>`), simpanOnClick=() => console.log('<form simpanOnClick>') }) {
  return (
    <form id='form-component' className='component'>
      {(list) && list.map((item, index) => (
        <div key={index} className='input'>
          <label htmlFor={`input-${item.key}`}>{keyToLabel(item.key)}</label>

          {(item.type === 'select') ? (
            <select id={`input-${item.key}`} value={item.value} onChange={e => onChange(item.key, e.target.value)}>
              {item.options.map((option, optionIndex) => (
                <option key={optionIndex} value={option}>{option}</option>
              ))}
            </select>
          ) : (
            <input type={item.type} value={item.value} onChange={e => onChange(item.key, e.target.value)} />
          )}
        </div>
      ))}

      <button type='submit' className='simpanButton' onClick={e => simpanOnClick(e)}>Simpan</button>
    </form>
  );
};
