/*eslint-disable*/
import { useEffect, useState } from "react";
import "./Authors.css";
import { AUTHORS, PUBLICATIONS } from "../../mocks/users";
import AuthorCard from "../AuthorCard/AuthorCard";
import Publication from "../Publication/Publication";
import Subscribe from "../Subscribe/Subscribe";
import Tags from "../Tags/Tags";
import { api } from "../../utils/api";
import Masonry from "react-layout-masonry";

function Authors() {
  const [authors, setAuthors] = useState(AUTHORS);
  // const [authors, setAuthors] = useState([]);
  const [filteredAuthors, setFilteredAuthors] = useState([]);
  const [publications, setPublications] = useState(PUBLICATIONS);
  // const [publications, setPublications] = useState([]);
  const [filteredPublications, setFilteredPublications] = useState([]);
  const [value, setValue] = useState("");

  useEffect(() => {
    Promise.all([api.getAuthors(), api.getPublications()])
      .then(([authors, publications]) => {
        setAuthors(authors);
        setPublications(publications);
      })
      .catch((e) => {
        console.log(e);
      });
  }, [setAuthors, setPublications]);

  function findPublications(e) {
    const filteredPublications = publications.filter(
      (item) => item.author === e.target.value
    );
    setFilteredPublications(filteredPublications);
  }

  function findAuthor(e) {
    const filteredArray = authors.filter(
      (item) => item.name === e.target.value
    );
    setValue(e.target.value);
    setFilteredAuthors(filteredArray);
  }

  function filterContent(e) {
    findPublications(e);
    findAuthor(e);
  }

  const nick = (item) => {
    if (item.nick.length !== 0 || "") {
      return `(псевдоним ${item.nick})`;
    }
  };

  return (
    <section className="authors">
      <div className="authors__container">
        <h1 className="authors__title">АВТОРЫ</h1>
        <Tags authors={authors} value={value} findAuthor={filterContent}></Tags>

        {!value && authors.length !== 0
          ? authors.map((author) => (
              <AuthorCard
                key={author.name}
                author={author}
                nick={nick}
              ></AuthorCard>
            ))
          : filteredAuthors.map((author) => (
              <AuthorCard
                key={author.name}
                author={author}
                nick={nick}
              ></AuthorCard>
            ))}

        <div className="publications">
          <Masonry
            className="publications__masonry"
            columnProps={{
              className: "publications__column",
              style: { alignItems: "center" },
            }}
            columns={{ 160: 1, 370: 2, 780: 3, 1279: 4 }}
          >
            {filteredAuthors.length !== 0 &&
              filteredPublications.map((publication) => (
                <div className="publications__content" key={publication.title}>
                  <Publication publication={publication}></Publication>
                </div>
              ))}
          </Masonry>
        </div>
      </div>
      <Subscribe></Subscribe>
    </section>
  );
}

export default Authors;
