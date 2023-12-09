import { useState } from "react";
import "./App.css"
function Worker(){
return(
<><h1>работники</h1>
    <div className="container">
    <form>
    <select >
    <option value="">Должность:</option>
    <option value="ALFKI">Alfreds Futterkiste</option>
    <option value="NORTS ">North/South</option>
    <option value="WOLZA">Wolski Zajazd</option>
  </select>
        <label>Ф.И.О работника
            <input type="text"/>
        
        </label>
        <label>Дата рождения
            <input type="date"   />
        </label>
        <label>Мобильный телефон
            <input type="tel"   />
        </label>
        <label>Дата найма
            <input type="date"   />
        </label>
        
        <button>Добавить</button>
        <button>Удалить</button>
        <button>Изменить</button>

    </form>

</div>
</>);}
export default Worker;

