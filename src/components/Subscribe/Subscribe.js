import "./Subscribe.css";
import IconEmail from "../../images/email_icon.svg";
import { useState } from "react";
import { api } from "../../utils/api";

function Subscribe() {
  const [email, setEmail] = useState("");
  const [error, setError] = useState("");

  function handleSendEmail(e) {
    e.preventDefault();

    api
      .sendEmail(email)
      .then((res) => {
        console.log(res);
      })
      .catch((e) => console.log(e));
  }

  function handleChnage(e) {
    const value = e.target.value;
    const error = e.target.validationMessage;

    setEmail(value);
    setError(error);
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
        <form className="subscribe__form" onSubmit={handleSendEmail} noValidate>
          <div className="subscribe__values">
            <input
              className="subscribe__input"
              placeholder="E-mail"
              onChange={handleChnage}
              value={email}
              id="emailValue"
              type="email"
            ></input>
            {error && (
              <span className="emailValue-error span__error">
                Неверно введен email!
              </span>
            )}
          </div>
          <button name="email" className="subscribe__button" type="submit">
            ПОДПИСАТЬСЯ
          </button>
        </form>
      </div>
    </div>
  );
}

export default Subscribe;
