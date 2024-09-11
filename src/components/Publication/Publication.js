import "./Publication.css";

function Publication(props) {
  const { publication } = props;

  function getClipPath(publication) {
    if (
      publication.title ===
      "«Дети – это всегда счастье, неважно, каким образом они появились»"
    ) {
      return "starlike";
    } else if (publication.title === "Что такое EMDR-терапия в психологии") {
      return "concave-rectangle";
    } else if (
      publication.title ===
      "Доказано: физкультура может заменить антидепрессанты"
    ) {
      return "concave-rectangle";
    } else {
      return "";
    }
  }

  return (
    <>
      <img
        style={{
          clipPath: `url(#${getClipPath(publication)})`,
        }}
        className="publications__image"
        src={publication.image}
        alt={`Фотография ${publication.title}`}
      ></img>
      <span className="publications__type">
        {publication.type.toUpperCase()}
      </span>
      <a href={publication.link} className="publications__title" target="blank">
        {publication.title}
      </a>
      <p className="publications__description">{publication.description}</p>
    </>
  );
}

export default Publication;
