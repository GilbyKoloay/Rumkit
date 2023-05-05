// styles
import '../../App.css';
import './style.css';

// images
import { Ryan } from '../../images';



export default function CallToAction() {
  return (
    <section id='section-callToAction' className='section' style={{backgroundImage: `url(${Ryan})`}}>
      <div className='texts-container'>
        <div className='section-title'>Call To Action</div>
        <div className='section-paragraph'>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
      </div>
      <div className='button-container'>
        <div className='button'>CALL TO ACTION</div>
      </div>
    </section>
  );
};
