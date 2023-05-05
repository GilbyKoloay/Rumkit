import './style.css';

// images
import { Ryan } from '../../images';



export default function About() {
  return (
    <section id='section-about'>
      <div>
        <div className='title'>Few Words About Kontol</div>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
        <div className='item-container'>
          <div className='item'>
            <img src={Ryan} alt='about-item-icon' />
            <div className='text-container'>
              <div className='subtitle'>KO</div>
              <p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
            </div>
          </div>
          <div className='item'>
            <img src={Ryan} alt='about-item-icon' />
            <div className='text-container'>
              <div className='subtitle'>KO</div>
              <p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
            </div>
          </div>
          <div className='item'>
            <img src={Ryan} alt='about-item-icon' />
            <div className='text-container'>
              <div className='subtitle'>KO</div>
              <p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
            </div>
          </div>
        </div>
      </div>
      <img src={Ryan} alt='Kontol' />
    </section>
  );
};
