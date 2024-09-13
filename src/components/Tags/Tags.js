function Tags(props) {
  const { authors, findAuthor, value } = props;

  function isActive(item) {
    if (value === item.name) {
      return "authors__button_active";
    } else {
      return "";
    }
  }

 

  return (
    <div className="authors__tags">
      {authors.length !== 0 &&
        authors.map((item) => (
          <input
            key={item.name}
            className={`authors__button ${isActive(item)}`}
            type="button"
            value={item.name}
            onClick={findAuthor}
          ></input>
        ))}
    </div>
  );
}

export default Tags;
