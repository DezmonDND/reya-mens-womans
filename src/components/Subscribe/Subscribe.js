import "./Subscribe.css";
import IconEmail from "../../images/email_icon.svg";

function Subscribe() {
  function handleSendEmail(e) {
    e.preventDefault();
  }

  return (
    <div className="subscribe">
      <div className="subscribe__container">
        <div className="subscribe__titles">
          <img
            src={IconEmail}
            alt="Иконка Email"
            className="subscribe__icon"
          ></img>
          <p className="subscribe__title">Следите за нашими обновлениями!</p>
        </div>
        <form className="subscribe__form">
          <input className="subscribe__input" placeholder="E-mail"></input>
          <button
            className="subscribe__button"
            type="submit"
            onClick={handleSendEmail}
          >
            ПОДПИСАТЬСЯ
          </button>
        </form>
      </div>
    </div>
  );
}

export default Subscribe;
