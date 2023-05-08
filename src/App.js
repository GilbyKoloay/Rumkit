import './App.css';

// section
import {
  Home,
  About,
  Facts,
  Services,
  CallToAction,
  Portfolio,
  Team,
  Contact
} from './sections';

// components
import { Navbar, Footer } from './components';



export default function App() {
  return (
    <div className='app'>
      <Navbar />
      <main>
        <Home />
        <About />
        <Facts />
        <Services />
        <CallToAction />
        <Portfolio />
        <Team />
        <Contact />
      </main>
      <Footer />
    </div>
  );
};
