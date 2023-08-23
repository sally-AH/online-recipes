import './style.css'
import MealItem from '../MealItem/meal_item'
import React, { useState,useEffect } from 'react'
import sendRequest from '../Core/config/request'
import requestMethods from '../Core/enums/requestMethods'


const MyRecipes = ()=>{
    const [recipes, setRecipes ] = useState([]);
    useEffect(() => {
      const fetchData = async () => {
        try {
          const response = await sendRequest({
            route: "user/getuserrecipes",
            method: requestMethods.GET,
          });
          console.log(response.data);
          setRecipes(response.data);
        } catch (error) {
          if (error.response.status === 401) {
          }
        }              
      };
      fetchData();
    }, []);
    return(
        <>
        <div className="main">
            <div className="heading">
                <h1>My Recipe</h1>
                <h4>some text  some text</h4>
            </div>
            <div className="searchBox">
                <input type="search" className="search-bar" placeholder='type to search'/>
            </div>
            <div className="container">
            {recipes.map((recipe) => {
              return  <MealItem key={recipe.id} data={recipe}/>
            })}
                
            </div>
        </div>
        </>
    )
}

export default MyRecipes