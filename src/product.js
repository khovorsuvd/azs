import { useState,useEffect } from "react";
import "./App.css";

function Products(){
    const [tableData, setTableData] = useState([]);
    
    useEffect(() => {
        
        const formdata = new FormData(document.getElementById("ProductForm"));
       formdata.append('action', 'fetchData');

    
       fetch("http://azs.localhost", {
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
        const formdata = new FormData(document.getElementById("ProductForm"));
        formdata.append('action', action);

       
      
       fetch("http://azs.localhost", {
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
    <form id="ProductForm"  >
    
        <label>Название товара
            <input type="text" name="productTitle"/>
            
        
        </label>
        <label>Цена р.
            <input type="number" min="0" step='0.01' name="productPrise"  />
        </label>
        <label>Количество
            <input type='number'  min="0"  name="productCol"  />
        </label>
        
        <input type="hidden" name="formname" value='productform' />
        <button onClick={(event)=>handleSubmit("add",event)} >Добавить</button>
        <button onClick={(event)=>handleSubmit("delite",event)} >Удалить</button>
       

    </form>
    <table >
        <thead>
        <tr>
            <th onClick={(event)=>handleSubmit("SortByTitle",event)}>Название</th>
            <th onClick={(event)=>handleSubmit("SortByPrise",event)}>Цена</th>
            <th onClick={(event)=>handleSubmit("SortByKol",event)}>Количество</th>
            
        </tr>
        </thead>
        <tbody>
        {tableData.map((rowData, index) => (
                            <tr key={index}>
                                <td>{rowData.product_title}</td>
                                <td>{rowData.prise}</td>
                                <td>{rowData.productcol}</td>
                                
                            </tr>
                        ))}       
                    </tbody>
    </table>

</div>
</>);}
export default Products;

