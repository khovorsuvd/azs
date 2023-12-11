import "./App.css";
import { useState } from 'react';
function Login({ handleLogin }) {

  const handleSubmit = (event) => {
    event.preventDefault();
    const form = new FormData(document.getElementById("LoginForm"));

    fetch("http://azs.localhost", {
      method: 'POST',
      header: {
        "Content-Type": 'multipart/form-data',
      },
      body: form
    })
    .then(response => response.json())
      .then(response => {
        console.log(response);
        if (response) {
          handleLogin(true);
        }
        else {
          handleLogin(false)
        }
      })
  }
  return (<><h1>Вход</h1>
    <div className="container">
      <form id="LoginForm" onSubmit={handleSubmit}>
        <label>Введите имя:
          <input
            type="text"
            name="username"

          />
        </label>
        <label>Введите пароль:
          <input
            type="password"
            name="password"

          />
        </label>
        <input type="hidden" name="formname" value='loginform' />
        <input type="submit" />
      </form>
    </div></>
  )
}
export default Login;
