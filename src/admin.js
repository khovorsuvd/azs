import { useState,useEffect } from "react";
import "./App.css";
import SaveBd from "./Button-savebd";
function Admin() {

    
    return (<><h1>сохранить бд</h1>
      <div className="container">
        <form >
         <SaveBd/>
        </form>
      </div>
     </>
    )
  }
  export default Admin;
  