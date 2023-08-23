import React from 'react';
import './style.css';
import NavLink from '../navbar-links/navbar-links'
import { useEffect } from 'react'
import sendRequest from '../../Core/config/request'
import requestMethods from '../../Core/enums/requestMethods'
import { useNavigate } from 'react-router-dom';

const Navbar = ()=> {
  const navigate = useNavigate();
  const logout = () => {
    localStorage.clear();
    navigate('/login');
  };

  return (
    <nav className="navbar">
      <div className="navbar-logo">
        <a href="/">Logo</a>
      </div>
      <ul className="navbar-links">
        <NavLink href="/" name="Home"/>
        <NavLink href="/" name="Add Recipes"/>
        <NavLink href="/myrecipes" name="My Recipes"/>
        <NavLink href="/login" onClick={logout} name="Logout"/>
      </ul>
    </nav>
  );
}

export default Navbar;