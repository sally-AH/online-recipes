import './App.css'
import Meal from './components/meals/meal'
import Recipe_Details from './components/RecipeDetails/recipe_details'
import { Routes, Route } from "react-router-dom";


function App() {
  return (
    <div className="App">
        <Routes>
          <Route path="/" element={<Meal />} />
          <Route path="/:id" element={<Recipe_Details />} />
        </Routes>
    </div>
  );
}

export default App;
