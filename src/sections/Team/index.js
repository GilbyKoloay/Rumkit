// styles
import '../../App.css';
import './style.css';

// images
import { Ryan } from '../../images';



const people = [
  {img: Ryan, name: 'Walter White', position: 'Chief Executive Officer'},
  {img: Ryan, name: 'Sarah Jhinson', position: 'Product Manager'},
  {img: Ryan, name: 'William Anderson', position: 'CTO'},
  {img: Ryan, name: 'Amanda Jepson', position: 'Accountant'}
];



const Item = ({ img, name, position }) => {
  return (
    <div className='item'>
      <img src={img} alt='team-item' />
      <div className='name'>{name}</div>
      <div className='position'>{position}</div>
      <div className='icons-container'>
        <div className='icon'>TW</div>
        <div className='icon'>FB</div>
        <div className='icon'>IG</div>
        <div className='icon'>LI</div>
      </div>
    </div>
  );
};



export default function Team() {
  return (
    <section id='section-team' className='section'>
      <div className='section-title'>TEAM</div>
      <div className='section-paragraph'>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</div>
      <div className='items-container'>
        {people.map(item => <Item img={item.img} name={item.name} position={item.position} />)}
      </div>
    </section>
  );
};
