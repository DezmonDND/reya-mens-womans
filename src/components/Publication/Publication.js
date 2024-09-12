import {
  BIG_CUB_TITLES,
  CONCAVE_TITLES,
  SMALL_CUB_TITLES,
  STARLIKE_TITLES,
} from "../../mocks/titles";
import "./Publication.css";

function Publication(props) {
  const { publication } = props;

  function addClass(publication) {
    if (STARLIKE_TITLES.includes(publication.title)) {
      return "publications__image_starlike";
    } else if (CONCAVE_TITLES.includes(publication.title)) {
      return "publications__image_concave";
    } else if (SMALL_CUB_TITLES.includes(publication.title)) {
      return "publications__image_small-cub";
    } else if (BIG_CUB_TITLES.includes(publication.title)) {
      return "publications__image_big-cub";
    } else {
      return "";
    }
  }

  return (
    <>
      <a
        className={`publications__image-link  ${addClass(publication)}`}
        href={publication.link}
        target="blank"
      >
        <img
          className="publications__image"
          src={publication.image}
          alt={`Фотография ${publication.title}`}
        ></img>
      </a>
      <span className="publications__type">
        {publication.type.toUpperCase()}
      </span>
      <p className="publications__title">{publication.title}</p>
      <p className="publications__description">{publication.description}</p>
    </>
  );
}

export default Publication;
