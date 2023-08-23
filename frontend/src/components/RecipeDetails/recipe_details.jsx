import './style.css'
import React, { useState,useEffect } from 'react'
import { useParams } from 'react-router-dom'
import sendRequest from '../Core/config/request'
import requestMethods from '../Core/enums/requestMethods'

const Recipe_Details = ()=>{
    const [recipe, setRecipes ] = useState([]);
    const { id } = useParams();
    useEffect(() => {
      const fetchData = async () => {
        try {
          const response = await sendRequest({
            route: "/user/getallrecipes",
            method: requestMethods.POST,
            body: {id: id}
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
            <h1 className='heading'>Recipe Details </h1>
            <div className='det-main'>
                <div className="det-container">
                    <div className='img_cont'>
                        <img src={recipe.pic_url} alt="pic" />
                    </div>
                    <div className="inner-content">
                        <h2>{recipe.name}</h2>
                        {recipe.cuisine &&  (<h2>{recipe.cuisine.name}</h2>)}
                    </div>
                </div>
                <div className="recipe-details">
                    <div className="ingredients">
                        <h2>Ingredients </h2>
                        <ul>{recipe.recipe_details &&  recipe.recipe_details.map((ing) => {
                            console.log(ing)
                            return <li key= {ing.ingredient.id}>{ing.ingredient && ing.ingredient.name} - {ing.ingredient && ing.ingredient_quantity}</li>
                            })}
                        </ul>
                    </div>
                </div>
            </div>

        </>
    )
}

export default Recipe_Details