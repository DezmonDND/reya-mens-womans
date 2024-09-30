import "./AuthorSmallCard.css";
import WithoutAvatarIcon from '../../images/no_avatar_icon.svg'

function AuthorSmallCard(props) {
  const { author } = props;

  return (
    <div className="authors-short__content">
      <div type="input" className="authors-short__button">
        <img
          className="authors-short__photo"
          src={author.avatar !== '' ? author.avatar : WithoutAvatarIcon}
          alt={`Фотография ${author.name}`}
        ></img>
      </div>
      <div className="authors-short__info">
        <h2 className="authors-short__name">{author.name}</h2>
        <p className="authors-short__job">{author.job}</p>
        <p className="authors-short__education">{author.education}</p>
      </div>
    </div>
  );
}

export default AuthorSmallCard;
