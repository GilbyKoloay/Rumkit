import '../../App.css';
import './style.css';

// images
import { Ryan } from '../../images';



const Item = ({ subtitle, text }) => {
  return (
    <div className='item'>
      <img src={Ryan} alt='about-item-icon' />
      <div className='text-container'>
        <div className='subtitle'>{subtitle}</div>
        <p>{text}</p>
      </div>
    </div>
  );
};



export default function About() {
  return (
    <section id='section-about' className='section'>
      <div>
        <div className='section-title'>Few Words About Kontol</div>
        <p className='section-paragraph'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
        <div className='item-container'>
          <Item subtitle='KO' text='Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi' />
          <Item subtitle='NT' text='Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi' />
          <Item subtitle='OL' text='Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi' />
        </div>
      </div>
      <img src={Ryan} alt='Kontol' />
    </section>
  );
};
