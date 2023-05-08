import { useState } from 'react';

// styles
import '../../App.css';
import './style.css';

// images
import { Ryan } from '../../images';



const Portfolios = [
  {img: Ryan, type: 'App', name: 'App 1'},
  {img: Ryan, type: 'Web', name: 'Web 3'},
  {img: Ryan, type: 'App', name: 'App 2'},
  {img: Ryan, type: 'Card', name: 'Card 2'},
  {img: Ryan, type: 'Web', name: 'Web 2'},
  {img: Ryan, type: 'App', name: 'App 3'},
  {img: Ryan, type: 'Card', name: 'Card 1'},
  {img: Ryan, type: 'Card', name: 'Card 3'},
  {img: Ryan, type: 'Web', name: 'Web 3'}
];



const Item = ({ img, type, name}) => {
  return (
    <div className='item' style={{backgroundImage: `url(${img})`}}>
      <div className='item-info'>
        <div className='texts-container'>
          <div>{name}</div>
          <div>{type}</div>
        </div>
        <div className='icons-container'>
          <div>plus</div>
          <div>attach</div>
        </div>
      </div>
    </div>
  );
};



export default function Portfolio() {
  const [selected, setSelected] = useState('All');



  return (
    <section id='section-portfolio' className='section'>
      <div className='section-title'>PORTFOLIO</div>
      <div className='section-paragraph'>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</div>
      <div className='buttons-container'>
        <div className={`${(selected === 'All') ? 'button-selected' : 'button'}`} onClick={() => setSelected('All')}>All</div>
        <div className={`${(selected === 'App') ? 'button-selected' : 'button'}`} onClick={() => setSelected('App')}>App</div>
        <div className={`${(selected === 'Card') ? 'button-selected' : 'button'}`} onClick={() => setSelected('Card')}>Card</div>
        <div className={`${(selected === 'Web') ? 'button-selected' : 'button'}`} onClick={() => setSelected('Web')}>Web</div>
      </div>
      <div className='items-container'>
        {(selected === 'All') && Portfolios.map((item, index) => <Item key={index} img={item.img} type={item.type} name={item.name} />)}
        {(selected === 'App') && Portfolios.map((item, index) => (item.type === 'App') && <Item key={index} img={item.img} type={item.type} name={item.name} />)}
        {(selected === 'Card') && Portfolios.map((item, index) => (item.type === 'Card') && <Item key={index} img={item.img} type={item.type} name={item.name} />)}
        {(selected === 'Web') && Portfolios.map((item, index) => (item.type === 'Web') && <Item key={index} img={item.img} type={item.type} name={item.name} />)}
      </div>
    </section>
  );
};
