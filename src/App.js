import { Route, Routes } from "react-router-dom";
import "./App.css";
import Header from "./components/Header/Header";
import Specialists from "./components/Specialists/Specialists";

function App() {
  return (
    <div className="App">
      <Header></Header>
      <Routes>
        <Route path="/" element={<Specialists></Specialists>}></Route>
      </Routes>
    </div>
  );
}

export default App;
