import './style.css';



export default function Navbar() {
  return (
    <nav>
      <div className='title'>RUMKIT</div>
      <div className='button-container'>
        <div className='button'>Home</div>
        <div className='button'>About</div>
        <div className='button'>Services</div>
        <div className='button'>Portfolio</div>
        <div className='button'>Team</div>
        <div className='button'>Drop Down</div>
        <div className='button'>Contact</div>
      </div>
      <div className='dropdown-button'>drop down button</div>
    </nav>
  );
};
