import './style.css';



export default function Facts() {
  return (
    <section id='section-facts'>
      <div className='title'>FACTS</div>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
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
