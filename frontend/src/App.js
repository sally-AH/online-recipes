import './App.css'
import Meal from './components/meals/meal'
import Recipe_Details from './components/RecipeDetails/recipe_details'
import { Routes, Route } from "react-router-dom";
import Navbar from './components/header/navbar/navbar'
import MyRecipes from './components/MyRecipes/my_recipes'
import Login from './components/login/LoginPage'

function App() {
  return (
    <div className="App">
      <Navbar/>
        <Routes>
          <Route path="/" element={<Meal />} />
          <Route path="/:id" element={<Recipe_Details />} />
          <Route path="/myrecipes" element={<MyRecipes />} />
          <Route path="/login" element={<Login />} />
        </Routes>
    </div>
  );
}

export default App;
