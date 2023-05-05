import '../../App.css';
import './style.css';

// images
import { Ryan } from '../../images';



const Item = ({ subtitle, text }) => {
  return (
    <div className='item'>
      <img src={Ryan} alt='services-item-icon' />
      <div className='subtitle'>{subtitle}</div>
      <div className='text'>{text}</div>
    </div>
  );
};



export default function Services() {
  return (
    <section id='section-services' className='section'>
      <div className='section-title'>SERVICES</div>
      <div className='section-paragraph'>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</div>
      <div className='items-container'>
        <Item subtitle='LOREM IPSUM' text='Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident' />
        <Item subtitle='DOLOR SITEMA' text='Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata' />
        <Item subtitle='SED UT PERSPICIATIS' text='Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur' />
        <Item subtitle='MAGNI DOLORES' text='Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum' />
        <Item subtitle='NEMO ENIM' text='At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque' />
        <Item subtitle='EIUSMOD TEMPOR' text='Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi' />
      </div>
    </section>
  );
};
