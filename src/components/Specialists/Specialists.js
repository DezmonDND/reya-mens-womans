/*eslint-disable*/
import { useState } from "react";
import "./Specialists.css";
import { SPECIALISTS } from "../../mocks/users";
import Subscribe from "../Subscribe/Subscribe";

function Specialists() {
  const [specialists, setSpecialists] = useState(SPECIALISTS);

  return (
    <section className="specialists">
      <div className="clip-paths">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="72"
          height="87"
          fill="none"
        >
          <clipPath id="rectangle">
            <rect
              width="62"
              height="88"
              x="21.918"
              y="-7.949"
              fill="#BBA1FF"
              rx="31"
              transform="rotate(20 21.918 -7.95)"
            />
          </clipPath>
        </svg>
      </div>
      <h1 className="specialists__title">СПЕЦИАЛИСТЫ</h1>
      <div className="specialists__contenainer">
        {specialists.map((specialst) => (
          <div className="specialists__content">
            <img
              src={specialst.avatar}
              className="specialists__image"
              alt={`Фотография специалиста ${specialst.name}`}
            ></img>

            <div className="specialists__info">
              <div className="specialists__names">
                <h2 className="specialists__name">
                  {specialst.firstName.toUpperCase()}
                </h2>
                <h2 className="specialists__name">
                  {specialst.secondName.toUpperCase()}
                </h2>
              </div>
              <p className="specialists__job">{specialst.job}</p>
            </div>
          </div>
        ))}
      </div>
      <Subscribe></Subscribe>
    </section>
  );
}

export default Specialists;
