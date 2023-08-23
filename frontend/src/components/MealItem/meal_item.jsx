import './style.css'
import React from 'react';
import { useNavigate} from 'react-router-dom';


const MealItem = ({data})=>{
    const navigate = useNavigate();
    {
        if(!data) return "404 Not Found";
    }
    
    return(
        <>
            <div className="card" onClick={()=>{navigate(`/${data.id}`)}}>
            <img src={data.pic_url} alt="pic" />
            <h3>{data.name}</h3>
            <h5>{data.cuisine.name}</h5>
            </div>
        </>
    )
}

export default MealItem