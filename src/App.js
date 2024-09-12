import './App.css'
import { Route, Routes } from "react-router-dom";
import Header from "./components/Header/Header";
import Specialists from "./components/Specialists/Specialists";
import Authors from "./components/Authors/Authors";
import ClipPaths from "./components/ClipPaths/ClipPaths";

function App() {
  return (
    <div className="App">
      <ClipPaths></ClipPaths>
      <Header></Header>
      <Routes>
        <Route path="/" element={<Specialists></Specialists>}></Route>
        <Route path="/authors" element={<Authors></Authors>}></Route>
      </Routes>
    </div>
  );
}

export default App;
