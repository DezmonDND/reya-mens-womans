import "./Publication.css";

function Publication(props) {
  const { publication } = props;

  return (
    <>
      <img
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
