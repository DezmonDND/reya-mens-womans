import "./Publication.css";

function Publication(props) {
  const { publication } = props;

  function addClass(publication) {
    if (publication.shape === "starlike") {
      return "publications__image_starlike";
    } else if (publication.shape === "concave") {
      return "publications__image_concave";
    } else if (publication.shape === "small-cub") {
      return "publications__image_small-cub";
    } else if (publication.shape === "big-cub") {
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
          src={publication.cover}
          alt={`Фотография ${publication.title}`}
        ></img>
      </a>
      <span className="publications__type">
        {publication.type.toUpperCase()}
      </span>
      <a href={publication.link} className="publications__title" target="blank">
        <span className="publications__highlight">
          {publication.title.slice(0, 10)}
        </span>
        {publication.title.slice(10)}
      </a>
      <p className="publications__description">{publication.description}</p>
    </>
  );
}

export default Publication;
