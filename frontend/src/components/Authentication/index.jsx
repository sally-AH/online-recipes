import React,{useState, useEffect} from 'react';
import axios from 'axios';
import { useNavigate  } from 'react-router-dom';
import sendRequest from '../Core/config/request'
import requestMethods from '../Core/enums/requestMethods'
import './login.css'

const Authentication = () => {
  localStorage.clear();
  const navigate  = useNavigate();
  const [email, setEmail] = useState("")
  const [password, setPassword] = useState("")

    const fetchData = async () => {
      try {
        const response = await sendRequest({
          route: "/guest/login",
          method: requestMethods.POST,
          body: {
            email: email,
            password: password
          }
        });
        console.log(response.data);
        localStorage.setItem('userId', response.data.id);
        localStorage.setItem('token', response.data.token);
        navigate('/home');
      } catch (error) {
        if (error.response.status === 401) {
        }
      }              
    };

  return (
    <>
      <div className="login-container">
        <div className="login-box">
          <h1>Login</h1>
          <div className="input-container">
            <label htmlFor="email">Email</label>
            <input type="text" id="email" className="input-field" placeholder="Enter your email" onChange={(e)=>setEmail(e.target.value)} required/>
          </div>
          <div className="input-container">
            <label htmlFor="password">Password</label>
            <input type="password" id="password" className="input-field" placeholder="Enter your password" onChange={(e)=>setPassword(e.target.value)} required/>
          </div>
          <button className="login-button" onClick={fetchData}>Log In</button>
        </div>
      </div>
    </>
  )
}

export default Authentication
