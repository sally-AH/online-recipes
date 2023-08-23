import './style.css'
import MealItem from '../MealItem/meal_item'
import React, { useState,useEffect } from 'react'
import { useNavigate } from 'react-router-dom';
import sendRequest from '../Core/config/request'
import requestMethods from '../Core/enums/requestMethods'


const Meal = ()=>{
    // const navigation = useNavigate();
    const [classes, setClasses ] = useState([]);
    useEffect(() => {
      const fetchData = async () => {
        try {
          const response = await sendRequest({
            route: "/Student/get_all_enrolled_courses",
            method: requestMethods.GET,
          });
          console.log(response.data);
          setClasses(response.data);
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
                <h1>Search for Recipe</h1>
                <h4>some text  some text</h4>
            </div>
            <div className="searchBox">
                <input type="search" className="search-bar" placeholder='type to search'/>
            </div>
            <div className="container">
                <MealItem/>
                <MealItem/>
                <MealItem/>
                <MealItem/>
                <MealItem/>
                <MealItem/>
                <MealItem/>
                <MealItem/>
            </div>
        </div>
        </>
    )
}

export default Meal