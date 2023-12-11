
import './App.css';
import ReactDOM from "react-dom/client";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import Layout from "./Layout.js";
import Worker from "./worker.js"
import Products from './product.js';
import Sale from './sale.js';
import Fuelsuppliers from './fuelsuppliers.js';
import Fuel from './Fuel.js';
 function Dashboad(){
return(
<BrowserRouter>
<Routes>
<Route path="/" element={<Layout />}>
          <Route index element={<Products />} />
          <Route path="worker" element={<Worker/>} />
          <Route path="sale" element={<Sale/>} />
          <Route path='fuelsuppliers' element={<Fuelsuppliers/>}/>
          <Route path='fuel' element={<Fuel/>}/>
        </Route>
  </Routes>
</BrowserRouter>
    );
}
export default Dashboad;