function Tags(props) {
  const { authors, findAuthor, value } = props;

  function isActive(item) {
    if (value === item.name) {
      return "authors__button_active";
    }
  }

  return (
    <div className="authors__tags">
      {authors.length !== 0 &&
        authors.map((item) => (
          <input
            className={`authors__button ${isActive(item)}`}
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
