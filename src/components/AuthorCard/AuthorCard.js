function AuthorCard(props) {
  const { author, nick } = props;

  return (
    <div className="authors__content">
      <img
        className="authors__photo"
        src={author.photo}
        alt={`Фотография ${author.name}`}
      ></img>

      <div className="authors__info">
        <div className="authors__biography">
          <h2 className="authors__name">
            {nick(author) !== undefined
              ? `${author.name} ${nick(author)}`
              : `${author.name}`}
          </h2>
          <p className="authors__job">{author.job.toUpperCase()}</p>
          <p className="authors__education">{author.education}</p>
        </div>
      </div>
      <p className="authors__quote">{author.quote}</p>
    </div>
  );
}

export default AuthorCard;
