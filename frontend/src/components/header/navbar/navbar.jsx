import React from 'react';
import './style.css';
import NavLink from '../navbar-links/navbar-links'
import { useEffect } from 'react'
import sendRequest from '../../Core/config/request'
import requestMethods from '../../Core/enums/requestMethods'
import { useNavigate } from 'react-router-dom';
import { useLocation } from 'react-router-dom';

const Navbar = ()=> {
  const location = useLocation();
  const navigate = useNavigate();
  const excludedPaths = ['/', '/register'];
  const shouldRenderHeader = !excludedPaths.includes(location.pathname)
  if (!shouldRenderHeader) {
    return null; // Do not render the header on excluded paths
  }

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
        <NavLink href="/" onClick={logout} name="Logout"/>
      </ul>
    </nav>
  );
}

export default Navbar;