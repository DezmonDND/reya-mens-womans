export class Api {
  constructor({ baseUrl }) {
    this._baseUrl = baseUrl;
  }

  _checkError(res) {
    if (res.ok) {
      return res.json();
    }
    return Promise.reject(`Ошибка: ${res.status}`);
  }

  getSpecialists() {
    return fetch(`${this._baseUrl}/specialists`, {
      method: "GET",
    }).then(this._checkError);
  }

  getAuthors() {
    return fetch(`${this._baseUrl}/all_authors`, {
      method: "GET",
    }).then(this._checkError);
  }

  getPublications() {
    return fetch(`${this._baseUrl}/publications`, {
      method: "GET",
    }).then(this._checkError);
  }

  sendEmail(email) {
    return fetch(
      "https://reya.media/wp-json/contact-form-7/v1/contact-forms/6/feedback",
      {
        method: "POST",
        body: {
          email: email,
        },
      }
    );
  }
}

export const api = new Api({
  baseUrl: "http://reya-media.local/wp-json/my-plugin/v1",
});
