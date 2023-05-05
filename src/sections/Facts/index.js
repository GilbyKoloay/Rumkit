import '../../App.css';
import './style.css';



const Item = ({ number, name }) => {
  return (
    <div className='item'>
      <div className='number'>{number}</div>
      <div className='name'>{name}</div>
    </div>
  );
};



export default function Facts() {
  return (
    <section id='section-facts' className='section'>
      <div className='section-title'>FACTS</div>
      <p className='section-paragraph'>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
      <div className='items-container'>
        <Item number={232} name='Clients' />
        <Item number={534} name='Projects' />
        <Item number={1463} name='Hours Of Support' />
        <Item number={42} name='Hard Workers' />
      </div>
    </section>
  );
};
