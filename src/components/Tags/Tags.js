function Tags(props) {
  const { authors, findAuthor, isClicked } = props;

  return (
    <div className="authors__tags">
      {authors.length !== 0 &&
        authors.map((item) => (
          <input
            className="authors__button"
            style={{ backgroundColor: isClicked ? "#BBA1FF" : "" }}
            type="button"
            value={item.name}
            onClick={findAuthor}
            placeholder={item.name}
          ></input>
        ))}
    </div>
  );
}

export default Tags;
