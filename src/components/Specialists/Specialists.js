/*eslint-disable*/
import { useEffect, useState } from "react";
import "./Specialists.css";
import { SPECIALISTS } from "../../mocks/users";
import Subscribe from "../Subscribe/Subscribe";
import { api } from "../../utils/api";
import Preloader from "../Preloader/Preloader";

function Specialists() {
  const [specialists, setSpecialists] = useState(SPECIALISTS);
  const [isLoading, setIsLoading] = useState(false);
  // const [specialists, setSpecialists] = useState([]);

  useEffect(() => {
    setIsLoading(true);
    api
      .getSpecialists()
      .then((res) => {
        setSpecialists(res);
      })
      .catch((e) => {
        console.log(e);
      })
      .finally(() => {
        setIsLoading(false);
      });
  }, [setSpecialists]);

  return (
    <section className="specialists">
      <h1 className="specialists__title">СПЕЦИАЛИСТЫ</h1>
      {/* {isLoading === true && <Preloader></Preloader>} */}
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
