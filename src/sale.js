import { useState, useEffect } from "react";
import "./App.css";

function Sale() {
   const [tableData, setTableData] = useState([]);
   

   useEffect(() => {

      const formdata = new FormData(document.getElementById("SaleForm"));
      formdata.append('action', 'fetchData');


      fetch("http://azs.localhost", {
         method: 'POST',
         header: {
            "Content-Type": 'multipart/form-data',
         },
         body: formdata
      })
         .then(response => response.json())
         .then(response => {
            
            setTableData(response.sale);
         });

   }, []);


   const handleSubmit = async (action, event) => {
      event.preventDefault();
      const formdata = new FormData(document.getElementById("SaleForm"));
      formdata.append('action', action);



      fetch("http://azs.localhost", {
         method: 'POST',
         header: {
            "Content-Type": 'multipart/form-data',
         },
         body: formdata
      })
         .then(response => response.json())
         .then(response => {

            setTableData(response.sale);
         });
      // Update table data state with the server response
      //setTableData(response);


   }

   return (
      <>

         <div className="tbleform">
            <form id="SaleForm"  >
               
            <label>обслуживающий работник
                  <input type='text' name="workern" />
               </label>
               
               <label>топливо
                  <input type='text' name="tfuel" />
               </label>

              
               <label>Количество
                  <input type='number' min="0" step='1' max='40' name="qFuel" />
               </label>


               
               <label>дополнительный товар
                  <input type='text' name="tproduct" />
               </label>
               
               <label>Количество
                  <input type='number' min="0" step='1' name="qProduct" />
               </label>
               <input type="hidden" name="formname" value="saleform" />
               <button onClick={(event) => handleSubmit("add", event)} >Добавить</button>
               <button onClick={(event) => handleSubmit("delite", event)} >Удалить</button>


            </form>
            <table >
               <thead>
                  <tr>
                     <th>Дата</th>
                     <th >Работник</th>
                     <th >Топливо</th>
                     <th >Количество л.</th>
                     <th >Дополнительный товар</th>
                     <th >Количество штук</th>
                     <th >Сумма</th>

                  </tr>
               </thead>
               <tbody>
              

                  {tableData.map((sale, index) => (
                     <tr key={index}>
                        <td>{sale.date_of_sale}</td>
                        <td>{sale.worker}</td>
                        <td>{sale.code_fuel}</td>
                        <td>{sale.quantityFuel}</td>
                        <td>{sale.product_title}</td>

                        <td>{sale.quantityProduct}</td>
                        <td>{sale.summ}</td>

                     </tr>
                  ))}
               </tbody>
            </table>

         </div>
      </>);
}
export default Sale;

