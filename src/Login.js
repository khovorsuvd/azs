import "./App.css";
import { useState } from 'react';
import ReactDOM from 'react-dom/client';
function Login({ handleLogin }) {
  const [inputs, setInputs] = useState({});
  const handleChange = (event) => {
    const name = event.target.name;
    const value = event.target.value;
    setInputs(values => ({ ...values, [name]: value }))
  }
  const handleSubmit = (event) => {
    event.preventDefault();

   

    fetch("http://azs.localhost", {
      method: 'POST',
      header: {
        "Content-Type": 'application/x-www-form-urlencoded',
      },
      body: JSON.stringify(inputs)
    })
      .then(response => response.text())
      .then(response => {
        if (response) {
          handleLogin(true);
        }
        else{
        handleLogin(false)}
      })
  }
  return (<><h1>Вход</h1>
    <div className="container">
      <form onSubmit={handleSubmit}>
        <label>Введите имя:
          <input
            type="text"
            name="username"
            value={inputs.username || ""}
            onChange={handleChange}
          />
        </label>
        <label>Введите пароль:
          <input
            type="password"
            name="password"
            value={inputs.password || ""}
            onChange={handleChange}
          />
        </label>
        <input type="hidden" name="form" />
        <input type="submit" />
      </form>
    </div></>
  )
}
export default Login;
