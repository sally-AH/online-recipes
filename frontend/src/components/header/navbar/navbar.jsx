import React from 'react';
import './style.css';
import NavLink from '../navbar-links/navbar-links'

const Navbar = ()=> {
  return (
    <nav className="navbar">
      <div className="navbar-logo">
        <a href="/">Logo</a>
      </div>
      <ul className="navbar-links">
        <NavLink href="/" name="Home"/>
        <NavLink href="/" name="Add Recipes"/>
        <NavLink href="/" name="My Recipes"/>
        <NavLink href="/" name="Logout"/>
      </ul>
    </nav>
  );
}

export default Navbar;