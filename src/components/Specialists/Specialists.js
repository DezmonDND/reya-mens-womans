/*eslint-disable*/
import { useEffect, useState } from "react";
import "./Specialists.css";
import { SPECIALISTS } from "../../mocks/users";
import Subscribe from "../Subscribe/Subscribe";
import { api } from "../../utils/api";

function Specialists() {
  const [specialists, setSpecialists] = useState(SPECIALISTS);
  // const [specialists, setSpecialists] = useState([]);

  useEffect(() => {
    api
      .getSpecialists()
      .then((res) => {
        setSpecialists(res);
      })
      .catch((e) => {
        console.log(e);
      });
  }, [setSpecialists]);

  return (
    <section className="specialists">
      <h1 className="specialists__title">СПЕЦИАЛИСТЫ</h1>
      <div className="specialists__contenainer">
        {specialists.map((specialst) => (
          <div className="specialists__content" key={specialst.secondName}>
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
