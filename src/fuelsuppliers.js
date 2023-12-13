import { useState,useEffect } from "react";
import "./App.css";

function Fuelsuppliers(){
   const [tableData, setTableData] = useState([]);
    
   useEffect(() => {
       
       const formdata = new FormData(document.getElementById("Fuelsuppliers"));
       formdata.append('action', 'fetchData');

   
      fetch("http://azs.localhost/fuelsuppliers.php", {
         method: 'POST',
         header: {
           "Content-Type": 'multipart/form-data',
         },
         body: formdata
       })
       .then(response => response.json())
        .then(response =>setTableData(response));

     }, []);
   

   const handleSubmit =async  (action,event) => {
       event.preventDefault();
       const formdata = new FormData(document.getElementById("Fuelsuppliers"));
       formdata.append('action', action);

      
     
      fetch("http://azs.localhost/fuelsuppliers.php", {
         method: 'POST',
         header: {
           "Content-Type": 'multipart/form-data',
         },
         body: formdata
       })
       .then(response => response.json())
        .then(response =>setTableData(response));

       // Update table data state with the server response
       //setTableData(response);
           
        
     }

return(
<>

   <div className="tbleform">
   <form id="Fuelsuppliers"  >
   
       <label>Название компании
           <input type="text" name="nameOFCompany"/>
           
       
       </label>
       <label>Контактная информация
           <input type="text" name="contact_information"  />
       </label>
       <label>ИНН
           <input type="text" name="UNN"  />
       </label>
      
       <input type="hidden" name="formname" value='fuelsuppliers' />
       <button onClick={(event)=>handleSubmit("add",event)} >Добавить</button>
       <button onClick={(event)=>handleSubmit("delite",event)} >Удалить</button>
      

   </form>
   <table >
       <thead>
       <tr>
           <th >Название компании</th>
           <th >Контактная информация</th>
           <th >ИНН</th>
           
       </tr>
       </thead>
       <tbody>
       {tableData.map((rowData, index) => (
                           <tr key={index}>
                               <td>{rowData.nameOFCompany}</td>
                               <td>{rowData.contact_information}</td>
                               <td>{rowData.unn}</td>
                               
                           </tr>
                       ))}       
                   </tbody>
   </table>

</div>
</>);}
export default Fuelsuppliers;

