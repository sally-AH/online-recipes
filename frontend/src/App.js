import './App.css'
import Meal from './components/meals/meal'
import Recipe_Details from './components/RecipeDetails/recipe_details'
import { Routes, Route } from "react-router-dom";
import Navbar from './components/header/navbar/navbar'
import MyRecipes from './components/MyRecipes/my_recipes'
import Authentication from './components/Authentication/index'
import Signup from  './components/signup/index'

function App() {
  return (
    <div className="App">
      <Navbar/>
        <Routes>
          <Route path="/home" element={<Meal />} />
          <Route path="/:id" element={<Recipe_Details />} />
          <Route path="/myrecipes" element={<MyRecipes />} />
          <Route path="/" element={<Authentication />} />
          <Route path="/register" element={<Signup />} />
          
        </Routes>
    </div>
  );
}

export default App;
