import { useState,useEffect } from "react";
import "./App.css";

function Worker(){
    const [tableData, setTableData] = useState([]);
    
    useEffect(() => {
        
        const formworker = new FormData(document.getElementById("WorkerForm"));
       formworker.append('action', 'fetchData');

    
       fetch("http://azs.localhost", {
          method: 'POST',
          header: {
            "Content-Type": 'multipart/form-data',
          },
          body: formworker
        })
        .then(response => response.json())
         .then(response =>setTableData(response));

      }, []);
    

    const handleSubmit =async  (action,event) => {
        event.preventDefault();
        const formworker = new FormData(document.getElementById("WorkerForm"));
       formworker.append('action', action);

       
      
       fetch("http://azs.localhost", {
          method: 'POST',
          header: {
            "Content-Type": 'multipart/form-data',
          },
          body: formworker
        })
        .then(response => response.json())
         .then(response =>setTableData(response));

        // Update table data state with the server response
        //setTableData(response);
            
         
      }

return(
<>

    <div className="tbleform">
    <form id="WorkerForm"  >
    <select name="workerjob">
    <option value="">Должность:</option>
    <option value='seller'>seller</option>
    <option value="admin">admin</option>
    <option value="accountant">accountant</option>
    <option value="cleaner">cleaner</option>
  </select>
        <label>Ф.И.О работника
            <input type="text" name="workername"/>
            
        
        </label>
        <label>Дата рождения
            <input type="date" name="workerdateofbirth"  />
        </label>
        <label>Мобильный телефон
            <input type="tel" pattern='[\+]\d{2}[\(]\d{2}[\)]\d{4}[\-]\d{4}' name="workertel"  />
        </label>
        <label>Дата найма
            <input type="date"  name="workerdateofhirning" />
        </label>
        <input type="hidden" name="formname" value='workerform' />
        <button onClick={(event)=>handleSubmit("add",event)} >Добавить</button>
        <button onClick={(event)=>handleSubmit("delite",event)} >Удалить</button>
       

    </form>
    <table >
        <thead>
        <tr>
            <th onClick={(event)=>handleSubmit("SortByJob",event)}>Должность</th>
            <th onClick={(event)=>handleSubmit("SortByName",event)}>Ф.И.О. работника</th>
            <th onClick={(event)=>handleSubmit("SortByDateOfBirth",event)}>Дата рождения</th>
            <th >Мобильный телефон</th>
            <th onClick={(event)=>handleSubmit("SortByDateOfofer",event)}>Дата найма</th>
        </tr>
        </thead>
        <tbody>
        {tableData.map((rowData, index) => (
                            <tr key={index}>
                                <td>{rowData.position}</td>
                                <td>{rowData.worker_name}</td>
                                <td>{rowData.date_of_birth}</td>
                                <td>{rowData.tel}</td>
                                <td>{rowData.date_of_offer}</td>
                            </tr>
                        ))}       
                    </tbody>
    </table>

</div>
</>);}
export default Worker;

