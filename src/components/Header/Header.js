import { NavLink } from "react-router-dom";
import "./Header.css";

function Header() {
  return (
    <header className="header">
      <div className="header__links">
        <NavLink
          className="header__link"
          to="/"
          style={({ isActive }) => ({ color: isActive ? "#000" : "" })}
        >
          СПЕЦИАЛИСТЫ
        </NavLink>
        <NavLink
          className="header__link"
          to="/authors"
          style={({ isActive }) => ({ color: isActive ? "#000" : "" })}
        >
          АВТОРЫ
        </NavLink>
      </div>
    </header>
  );
}

export default Header;
