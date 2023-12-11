import { Outlet, Link } from "react-router-dom";

const Layout = () => {
  return (
    <>
      <nav>
        <ul>
          <li>
            <Link to="/">прочие товары</Link>
          </li>
          <li>
            <Link to="/worker">работники</Link>
          </li>
          <li>
            <Link to="/sale">продажа</Link>
          </li>
          <li>
            <Link to="/fuelsuppliers">Поставщики топлива</Link>
          </li>
          <li>
            <Link to="/fuel">Топливо</Link>
          </li>
          
        </ul>
      </nav>

      <Outlet />
    </>
  )
};

export default Layout