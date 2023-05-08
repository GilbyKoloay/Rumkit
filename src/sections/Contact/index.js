import { useState } from 'react';

// styles
import '../../App.css';
import './style.css';



const Input = ({ label, icon='icon', type='input', placeholder, value, onChange }) => {
  return (
    <div className='input'>
      <div className='labels-wrapper'>
        <div className='icon'>{icon}</div>
        <div className='label'>{label}</div>
      </div>
      {(type === 'input')
        ? <input
            type='text'
            placeholder={placeholder}
            value={value}
            onChange={e => onChange(e.target.value)}
          />
        : (type === 'textarea') && (
          <textarea placeholder={placeholder} onChange={e => onChange(e.target.value)}>{value}</textarea>
        )
      }
    </div>
  );
};

const FormMessageIcons = () => {
  return (
    <div className='message-icons-wrapper'>
      <div className='message-icon'>T</div>
      <div className='message-icon'>F</div>
      <div className='message-icon'>I</div>
      <div className='message-icon'>I</div>
      <div className='message-icon'>L</div>
    </div>
  );
};



export default function Contact() {
  const [name, setName] = useState('');
  const [email, setEmail] = useState('');
  const [subject, setSubject] = useState('');
  const [message, setMessage] = useState('');



  function formSubmitHandler(e) {
    e.preventDefault();

    console.log(`name = ${name} | email = ${email} | subject = ${subject} | message = ${message}`);
  }



  return (
    <section id='section-contact' className='section'>
      <div className='section-title'>CONTACT</div>
      <div className='section-paragraph'>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</div>
      <iframe
        title='contact-iframe'
        src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22864.11283411948!2d-73.96468908098944!3d40.630720240038435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbg!4v1540447494452'
      />
      <form>
        <Input label={<>A108 Adam Street<br />New York, NY 535022</>} placeholder='Your Name' value={name} onChange={setName} />
        <Input label='info@example.com' placeholder='Your Email' value={email} onChange={setEmail} />
        <Input label='+1 5589 55488 55s' placeholder='Subject' value={subject} onChange={setSubject} />
        <Input icon={<FormMessageIcons />} type='textarea' placeholder='Message' value={message} onChange={setMessage} />
        <button onClick={e => formSubmitHandler(e)}>Send Message</button>
      </form>
    </section>
  );
};
