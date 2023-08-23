import React from 'react';
import './style.css';
import { useNavigate} from 'react-router-dom';

const  NavLink = (props)=> {
  const navigate = useNavigate();
  return (
    <>
        <li><a href={props.href} >{props.name}</a></li>
    </>

  );
}

export default NavLink;