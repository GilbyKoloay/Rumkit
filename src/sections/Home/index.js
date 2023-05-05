// styles
import './style.css';

// images
import { Ryan } from '../../images';



export default function Home() {
  return (
    <section id='section-home' className='section' style={{backgroundImage: `url(${Ryan})`}}>
      <div className='title'>WELCOME TO KONTOL RYAN</div>
      <div className='subtitle'>Ryan Gian Kontol</div>
      <div className='button'>GET NGEUE</div>
    </section>
  );
};
