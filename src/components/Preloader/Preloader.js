import './Preloader.css';
import LoaderImage from '../../images/loader.svg'

function Preloader() {
  return (
    <div className='preloader'>
      <img src={LoaderImage} className='preloader__image' alt='Preloader'></img>
    </div>
  );
}

export default Preloader;
