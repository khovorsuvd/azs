import Login from "./Login.js";
import { useState } from 'react';
import ReactDOM from 'react-dom/client';
import Dashboad from "./Dashboard.js";

function App() {
 const [isLoggedIn, setIsLoggedIn] = useState(false);

  const handleLogin = (status) => {
    setIsLoggedIn(status);
  };
  return (
    <>
    {!isLoggedIn ? (
        <Login handleLogin={handleLogin} />
      ) : (
        <Dashboad/>
      )}
    
   
    
    </>
  );
}

export default App;
