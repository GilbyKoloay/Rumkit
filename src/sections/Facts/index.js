import '../../App.css';
import './style.css';



export default function Facts() {
  return (
    <section id='section-facts' className='section'>
      <div className='section-title'>FACTS</div>
      <p className='section-paragraph'>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
      <div className='items-container'>
        <div className='item'>
          <div className='number'>232</div>
          <div className='name'>Clients</div>
        </div>
        <div className='item'>
          <div className='number'>534</div>
          <div className='name'>Projects</div>
        </div>
        <div className='item'>
          <div className='number'>1463</div>
          <div className='name'>Hours Of Support</div>
        </div>
        <div className='item'>
          <div className='number'>42</div>
          <div className='name'>Hard  Workers</div>
        </div>
      </div>
    </section>
  );
};
