import { useState,useEffect } from "react";
import "./App.css";

function Fuel(){
    const [tableData, setTableData] = useState([]);
    const [fuelsuppliers, setFuelsuppliers] = useState([]);
    
    useEffect(() => {
        
        const formdata = new FormData(document.getElementById("FuelForm"));
       formdata.append('action', 'fetchData');

    
       fetch("http://azs.localhost/fuel.php", {
          method: 'POST',
          header: {
            "Content-Type": 'multipart/form-data',
          },
          body: formdata
        })
        .then(response => response.json())
         .then(response => {
            setFuelsuppliers(response.fuelsuppliers);
            setTableData(response.fuel);
         });

      }, []);
    

    const handleSubmit =async  (action,event) => {
        event.preventDefault();
        const formdata = new FormData(document.getElementById("FuelForm"));
        formdata.append('action', action);

       
      
       fetch("http://azs.localhost/fuel.php", {
          method: 'POST',
          header: {
            "Content-Type": 'multipart/form-data',
          },
          body: formdata
        })
        .then(response => response.json())
        .then(response => {
         
         setTableData(response.fuel);
      });

        // Update table data state with the server response
        //setTableData(response);
            
         
      }

return(
<>

    <div className="tbleform">
    <form id="FuelForm"  >
    <select name="FuelsupliseSelected"><option>Название компании поставщика</option>
                  {fuelsuppliers.map((fuelsupplier, index) => (
                     <option key={index} value={fuelsupplier.nameOFCompany}>
                       {fuelsupplier.nameOFCompany}
                     </option>
                  ))}
               </select>
               
    
        <label>Код топлива
            <input type="text" name="code_fuel"/>
                   
        </label>
        <label>Вид топлива
            <input type="text" name="fuel_type"/>
                   
        </label>
        <label>Наименование единиц измерения
            <input type="text" name="unit_of_measuring"/>
                   
        </label>
        <label>Цена р.
            <input type="number" min="0" step='0.01' name="prise"  />
        </label>
        
        
        <input type="hidden" name="formname" value="FuelForm" />
        <button onClick={(event)=>handleSubmit("add",event)} >Добавить</button>
        <button onClick={(event)=>handleSubmit("delite",event)} >Удалить</button>
       

    </form>
    <table >
        <thead>
        <tr>
            <th >Название компании поставщика</th>
            <th >Код топлива</th>
            <th >Вид топлива</th>
            <th >Наименование единиц измерения</th>
            <th >Цена р</th>
            
            
        </tr>
        </thead>
        <tbody>
        {tableData.map((fuel, index) => (
                           <tr key={index}>
                              <td>{fuel.nameOFCompany}</td>
                               <td>{fuel.code_fuel}</td>
                               <td>{fuel.fuel_type}</td>
                               <td>{fuel.unit_of_measuring}</td>
                               <td>{fuel.prise}</td>
                               
                               
                           </tr>
                       ))}      
                    </tbody>
    </table>

</div>
</>);}
export default Fuel;

