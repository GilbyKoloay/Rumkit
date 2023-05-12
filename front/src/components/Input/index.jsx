// styles
import './style.css';



export default function Input({ placeholder='', type='text', value='', onChange=value => console.log(`<input value = ${value}>`) }) {
  return (
    <input
      id='input-component'
      className='component'
      placeholder={placeholder}
      type={type}
      value={value}
      onChange={e => onChange(e.target.value)}
    />
  );
};
