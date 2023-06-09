// styles
import './style.css';

// functions
import { keyToLabel } from '../../functions';



export default function Form({
  list=null,
  onChange=value => console.log(`<form onChange=${value}>`),
  buttonLabel='<form buttonLabel>',
  buttonOnClick=() => console.log('<form buttonOnClick>')
}) {
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
            <input
              type={item.type}
              accept='.jpg'
              value={(item.type === 'file') ? undefined : item.value}
              onChange={e => onChange(item.key, (item.type === 'file') ? e.target.files[0] : e.target.value)}
            />
          )}
        </div>
      ))}

      <button type='submit' className='simpanButton' onClick={e => buttonOnClick(e)}>{buttonLabel}</button>
    </form>
  );
};
