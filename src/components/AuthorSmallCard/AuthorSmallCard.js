import "./AuthorSmallCard.css";
import WithoutAvatarIcon from "../../images/no_avatar_icon.svg";

function AuthorSmallCard(props) {
  const { author, handleAuthorClick } = props;

  return (
    <button
      className="authors-short__content"
      onClick={() => handleAuthorClick(author)}
    >
      <div className="authors-short__button">
        <img
          className="authors-short__photo"
          src={author.avatar !== "" ? author.avatar : WithoutAvatarIcon}
          alt={`Фотография ${author.name}`}
        ></img>
      </div>
      <div className="authors-short__info">
        <div className="authors-short__name">{author.name}</div>
        <p className="authors-short__job">{author.job}</p>
        <p className="authors-short__education">{author.education}</p>
      </div>
    </button>
  );
}

export default AuthorSmallCard;
