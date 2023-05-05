import '../../App.css';
import './style.css';

// images
import { Ryan } from '../../images';



export default function Services() {
  return (
    <section id='section-services' className='section'>
      <div className='section-title'>SERVICES</div>
      <div className='section-paragraph'>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</div>
      <div className='items-container'>
        <div className='item'>
          <img src={Ryan} alt='services-item-icon' />
          <div className='subtitle'>LOREM IPSUM</div>
          <div className='text'>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</div>
        </div>
        <div className='item'>
          <img src={Ryan} alt='services-item-icon' />
          <div className='subtitle'>DOLOR SITEMA</div>
          <div className='text'>Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</div>
        </div>
        <div className='item'>
          <img src={Ryan} alt='services-item-icon' />
          <div className='subtitle'>SED UT PERSPICIATIS</div>
          <div className='text'>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</div>
        </div>
        <div className='item'>
          <img src={Ryan} alt='services-item-icon' />
          <div className='subtitle'>MAGNI DOLORES</div>
          <div className='text'>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</div>
        </div>
        <div className='item'>
          <img src={Ryan} alt='services-item-icon' />
          <div className='subtitle'>NEMO ENIM</div>
          <div className='text'>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</div>
        </div>
        <div className='item'>
          <img src={Ryan} alt='services-item-icon' />
          <div className='subtitle'>EIUSMOD TEMPOR</div>
          <div className='text'>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</div>
        </div>
      </div>
    </section>
  );
};
