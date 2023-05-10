// styles
import './style.css';



export default function Input({ placeholder='', type='text', value='', onChange=value => console.log(`<input value = ${value}>`) }) {
  return (
    <div id='input-component' className='component'>
      <input
        placeholder={placeholder}
        type={type}
        value={value}
        onChange={e => onChange(e.target.value)}
      />
    </div>
  );
};
