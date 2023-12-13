import { useState,useEffect } from "react";
import "./App.css";

function Sale(){
    const [tableData, setTableData] = useState([]);
    const [workers, setWorkers] = useState([]);
    const [products, setProducts] = useState([]);
    
    useEffect(() => {
        
        const formdata = new FormData(document.getElementById("SaleForm"));
       formdata.append('action', 'fetchData');

    
       fetch("http://azs.localhost/sale.php", {
          method: 'POST',
          header: {
            "Content-Type": 'multipart/form-data',
          },
          body: formdata
        })
        .then(response => response.json())
         .then(response => {
            setWorkers(response.workers);
            setProducts(response.products);
            setTableData(response.sales);
         })
         .then(response => console.log(response));
      }, []);
    

    const handleSubmit =async  (action,event) => {
        event.preventDefault();
        const formdata = new FormData(document.getElementById("ProductForm"));
        formdata.append('action', action);

       
      
       fetch("http://azs.localhost/sale.php", {
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
    <form id="SaleForm"  >
    <select><option>обслуживающий работник</option>
                  {workers.map((worker, index) => (
                     <option key={index}>
                        {worker.worker_name}
                     </option>
                  ))}
               </select>
               <select><option>дополнительный товар</option>
                  {products.map((product, index) => (
                     <option key={index}>
                        {product.product_title}
                     </option>
                  ))}
               </select>
    
        <label>Название товара
            <input type="text" name="productTitle"/>
            
        
        </label>
        <label>Цена р.
            <input type="number" min="0" step='0.01' name="productPrise"  />
        </label>
        <label>Количество
            <input type='number'  min="0"  name="productCol"  />
        </label>
        
        <input type="hidden" name="formname" value="saleform" />
        <button onClick={(event)=>handleSubmit("add",event)} >Добавить</button>
        <button onClick={(event)=>handleSubmit("delite",event)} >Удалить</button>
       

    </form>
    <table >
        <thead>
        <tr>
            <th >Дата</th>
            <th >топливо </th>
            <th >обслуживающий работник</th>
            <th >количество л.</th>
            <th>Сумма</th>
            
        </tr>
        </thead>
        <tbody>
        {tableData.map((sale, index) => (
                           <tr key={index}>
                              <td>{sale.date_of_sale}</td>
                               <td>{sale.code_fuel}</td>
                               <td>{sale.worker}</td>
                               <td>{sale.quantityFuel}</td>
                               <td>{sale.summ}</td>
                               
                               
                           </tr>
                       ))}  
                    </tbody>
    </table>

</div>
</>);}
export default Sale;

