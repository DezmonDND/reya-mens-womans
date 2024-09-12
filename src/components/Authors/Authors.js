/*eslint-disable*/
import { useState } from "react";
import "./Authors.css";
import { AUTHORS } from "../../mocks/users";
import AuthorCard from "../AuthorCard/AuthorCard";
import Publication from "../Publication/Publication";
import Subscribe from "../Subscribe/Subscribe";
import Tags from "../Tags/Tags";

function Authors() {
  const [authors, setAuthors] = useState(AUTHORS);
  const [filteredAuthors, setFilteredAuthors] = useState([]);
  const [value, setValue] = useState("");
  const [isClicked, setIsClicked] = useState(false);

  function findAuthor(e) {
    const filteredArray = authors.filter(
      (item) => item.name === e.target.value
    );
    setValue(e.target.value);
    setFilteredAuthors(filteredArray);
  }

  return (
    <section className="authors">
      <div className="authors__container">
        <h1 className="authors__title">АВТОРЫ</h1>
        <Tags
          authors={authors}
          isClicked={isClicked}
          findAuthor={findAuthor}
        ></Tags>
        {!value && authors.length !== 0
          ? authors.map((author) => <AuthorCard author={author}></AuthorCard>)
          : filteredAuthors.map((author) => (
              <AuthorCard author={author}></AuthorCard>
            ))}
        <div className="publications">
          {filteredAuthors.length !== 0 &&
            filteredAuthors.map((author) => (
              <div className="publications__container" key={author.name}>
                {author.publications.map((publication) => (
                  <div
                    className="publications__content"
                    key={publication.title}
                  >
                    <Publication publication={publication}></Publication>
                  </div>
                ))}
              </div>
            ))}
        </div>
      </div>
      <Subscribe></Subscribe>
    </section>
  );
}

export default Authors;
