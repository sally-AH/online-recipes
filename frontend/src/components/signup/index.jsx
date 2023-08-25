import React,{useState} from 'react';
import axios from 'axios';
import { useNavigate  } from 'react-router-dom';
import sendRequest from '../Core/config/request'
import requestMethods from '../Core/enums/requestMethods'
import './style.css'

const Signup = () => {
  const navigate  = useNavigate();
  const [name, setName] = useState("")
  const [email, setEmail] = useState("")
  const [password, setPassword] = useState("")

  const fetchData = async () => {
    try {
      const response = await sendRequest({
        route: "/guest/register",
        method: requestMethods.POST,
        body: {
          name: name,
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
        <div className="signup-container">
          <div className="signup-box">
              <h1>Sign Up</h1>
              <div className="input-container">
                  <label htmlFor="fullname">Full Name</label>
                  <input type="text" id="fullname" class="input-field" placeholder="Enter your full name" onChange={(e)=>setName(e.target.value)} required/>
              </div>
              <div className="input-container">
                  <label htmlFor="email">Email</label>
                  <input type="email" id="email" class="input-field" placeholder="Enter your email" onChange={(e)=>setEmail(e.target.value)} required/>
              </div>
              <div className="input-container">
                  <label htmlFor="password">Password</label>
                  <input type="password" id="password" class="input-field" placeholder="Choose a password" onChange={(e)=>setPassword(e.target.value)} required/>
              </div>
              <button className="signup-button" onClick={fetchData}>Sign Up</button>
          </div>
        </div>
      </>
  )
}

export default Signup
