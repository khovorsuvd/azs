<?php
header("Access-Control-Allow-Origin: *");
?>
<?php



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

   $data = $_POST['formname'];


   switch ($data) {
      case "loginform":
         $username = $_POST["username"];
         $password1 = $_POST["password"];
         $host = 'localhost:3307'; // Адрес вашей MySQL базы данных
         $username = $_POST["username"];
         $password = $_POST["password"];
          // Ваш пароль MySQL
         $database = 'azs'; // Ваша база данных
         
         // Подключение к MySQL
         $connection = new mysqli($host, $username, $password, $database);
         if ($connection->connect_error){
            echo false;
         } else {
            echo true;
         }
         break;
      case "workerform":
         $action = htmlspecialchars($_POST["action"]);
         $workerjob = $_POST["workerjob"];
         $workername = $_POST["workername"];
         $workerdateofbirth = $_POST["workerdateofbirth"];
         $workertel = $_POST["workertel"];
         $workerdateofhirning = $_POST["workerdateofhirning"];
         function QueryRQSULT($query, $connection)
         {
            $result = $connection->query($query);
            $response = array();
            if ($result->num_rows > 0) {

               while ($row = $result->fetch_assoc()) {
                  $worker = array(
                     'id_worker' => $row["id_worker"],
                     'position' => $row["position"],
                     'worker_name' => $row["worker_name"],
                     'date_of_birth' => $row["date_of_birth"],
                     'tel' => $row["tel"],
                     'date_of_offer' => $row["date_of_offer"]
                  );
                  $response[] = $worker;
               }
            }
            echo json_encode($response);
         }
         switch ($action) {
            case "add":
               $query = "INSERT INTO Worker (position,worker_name,date_of_birth,tel,date_of_offer) VALUES('$workerjob','$workername', '$workerdateofbirth','$workertel','$workerdateofhirning') ";
               $result = $connection->query($query);

               $query = "select * from Worker";
               QueryRQSULT($query, $connection);

               break;
            case "delite":

               $query = "DELETE FROM Worker where position='$workerjob'and worker_name='$workername'and date_of_birth='$workerdateofbirth'and tel='$workertel'and date_of_offer='$workerdateofhirning';";
               $result = $connection->query($query);
               $query = "select * from Worker";
               QueryRQSULT($query, $connection);

               break;
            case "SortByJob":
               $query = "select * from Worker
                  ORDER BY position;";
               QueryRQSULT($query, $connection);
               break;
            case "fetchData":

               $query = "select * from Worker";
               QueryRQSULT($query, $connection);

               break;
            case "SortByName":
               $query = "select * from Worker
                     ORDER BY worker_name;";
               QueryRQSULT($query, $connection);
               break;
            case "SortByDateOfBirth":
               $query = "select * from Worker
                        ORDER BY date_of_birth;";
               QueryRQSULT($query, $connection);
               break;
            case "SortByDateOfofer":
               $query = "select * from Worker
                           ORDER BY date_of_offer;";
               QueryRQSULT($query, $connection);
               break;
         }
         ;

         break;




      case "productform":
         $action = htmlspecialchars($_POST["action"]);
         $productTitle = $_POST["productTitle"];
         $productPrise = $_POST["productPrise"];
         $productCol = $_POST["productCol"];
         function QueryRQSULT($query, $connection)
         {
            $result = $connection->query($query);
            $response = array();
            if ($result->num_rows > 0) {

               while ($row = $result->fetch_assoc()) {
                  $product = array(
                     'product_id' => $row["product_id"],
                     'product_title' => $row["product_title"],
                     'prise' => $row["prise"],
                     'productcol' => $row["productcol"]
                  );
                  $response[] = $product;
               }
            }
            echo json_encode($response);
         }
         switch ($action) {
            case "add":

               $query = "INSERT INTO product(product_title,prise,productcol) VALUES('$productTitle','$productPrise', '$productCol') ";
               $result = $connection->query($query);

               $query = "select * from product";
               QueryRQSULT($query, $connection);

               break;
            case "delite":

               $query = "DELETE FROM product where product_title='$productTitle'and prise='$productPrise';";
               $result = $connection->query($query);
               $query = "select * from product";
               QueryRQSULT($query, $connection);

               break;
            case "SortByTitle":
               $query = "select * from product
                     ORDER BY product_title;";
               QueryRQSULT($query, $connection);
               break;
            case "fetchData":
               $query = "select * from product";
               QueryRQSULT($query, $connection);

               break;
            case "SortByPrise":
               $query = "select * from product
                        ORDER BY prise;";
               QueryRQSULT($query, $connection);
               break;
            case "SortByKol":
               $query = "select * from product
                           ORDER BY productcol;";
               QueryRQSULT($query, $connection);
               break;
         }

         break;


      case "fuelsuppliers":
         $action = htmlspecialchars($_POST["action"]);
         $nameOFCompany = $_POST["nameOFCompany"];
         $contact_information = $_POST["contact_information"];
         $UNN = $_POST["UNN"];
         function QueryRQSULT($query, $connection)
         {
            $result = $connection->query($query);
            $response = array();
            if ($result->num_rows > 0) {

               while ($row = $result->fetch_assoc()) {
                  $arrey = array(
                     'nameOFCompany' => $row["nameOFCompany"],
                     'contact_information' => $row["contact_information"],
                     'unn' => $row["UNN"],

                  );
                  $response[] = $arrey;
               }
            }
            echo json_encode($response);
         }
         switch ($action) {
            case "add":

               $query = "INSERT INTO fuelsuppliers(nameOFCompany,contact_information,UNN) VALUES('$nameOFCompany',' $contact_information', '$UNN') ";
               $result = $connection->query($query);

               $query = "select * from fuelsuppliers";
               QueryRQSULT($query, $connection);

               break;
            case "delite":

               $query = "DELETE FROM fuelsuppliers where nameOFCompany='$nameOFCompany'or UNN='$UNN';";
               $result = $connection->query($query);
               $query = "select * from fuelsuppliers";
               QueryRQSULT($query, $connection);

               break;

            case "fetchData":
               $query = "select * from fuelsuppliers";
               QueryRQSULT($query, $connection);

               break;
         }

         break;
      







         case "saleform":
            $action = htmlentities($_POST["action"]);
            $workern = htmlentities($_POST["workern"]);
            $workern = htmlentities($_POST["tfuel"]);
            $workern = htmlentities($_POST["workern"]);
            $workern = htmlentities($_POST["workern"]);


            switch ($action) {
               case "fetchData":

               $query = "select * from sale";
               $result = $connection->query($query);
            $response = array();
            if ($result->num_rows > 0) {

               while ($row = $result->fetch_assoc()) {
                  $sale= array(
                     'date_of_sale' => $row["date_of_sale"],
                     'code_fuel' => $row["code_fuel"],
                     'quantityFuel' => $row["quantityFuel"],
                     'product_title' => $row["product_title"] ,
                     'worker' => $row["worker"],
                     'quantityProduct' => $row["quantityProduct"],
                     'summ' => $row["summ"]
                  );
                  $response['sale'][] = $sale;
               }






               

            }
            


            echo json_encode($response);
            break;
            case "add":
               $query = "INSERT INTO fuelsuppliers(nameOFCompany,contact_information,UNN) VALUES('$nameOFCompany',' $contact_information', '$UNN') ";
               $query = "select * from sale";
               $result = $connection->query($query);
            $response = array();
            if ($result->num_rows > 0) {

               while ($row = $result->fetch_assoc()) {
                  $sale= array(
                     'date_of_sale' => $row["date_of_sale"],
                     'code_fuel' => $row["code_fuel"],
                     'quantityFuel' => $row["quantityFuel"],
                     'product_title' => $row["product_title"] ,
                     'worker' => $row["worker"],
                     'quantityProduct' => $row["quantityProduct"],
                     'summ' => $row["summ"]
                  );
                  $response['sale'][] = $sale;
               }






               

            }
            


            echo json_encode($response);
            break;



            }

         break;







      case "FuelForm":
         $action = htmlentities($_POST["action"]);
         $FuelsupliseSelected = $_POST["FuelsupliseSelected"];
         $code_fuel = $_POST["code_fuel"];
         $fuel_type = $_POST["fuel_type"];
         $unit_of_measuring = $_POST["unit_of_measuring"];
         $prise = $_POST["prise"];
         function QueryRQSULT($query, $connection)
         {
            $result = $connection->query($query);

            if ($result->num_rows > 0) {
               while ($row = $result->fetch_assoc()) {
                  $fuel = array(
                     'code_fuel' => $row["code_fuel"],
                     'fuel_type' => $row["fuel_type"],
                     'unit_of_measuring' => $row["unit_of_measuring"],
                     'prise' => $row["prise"],
                     'nameOFCompany' => $row["nameOFCompany"]
                  );
                  $response['fuel'][] = $fuel;
               }
            }

            echo json_encode($response);
         }

         switch ($action) {
            case "fetchData":
               $query = "select * from fuelsuppliers ";
               $result = $connection->query($query);
               $response = array();

               if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                     $fuelsupplier = array(

                        'nameOFCompany' => $row["nameOFCompany"]
                     );
                     $response['fuelsuppliers'][] = $fuelsupplier;
                  }
               }

               $query = "select * from fuel";
               $result = $connection->query($query);

               if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                     $fuel = array(
                        'code_fuel' => $row["code_fuel"],
                        'fuel_type' => $row["fuel_type"],
                        'unit_of_measuring' => $row["unit_of_measuring"],
                        'prise' => $row["prise"],
                        'nameOFCompany' => $row["nameOFCompany"]
                     );
                     $response['fuel'][] = $fuel;
                  }
               }

               echo json_encode($response);
               break;
            case "add":
               $query = "INSERT INTO fuel(code_fuel, fuel_type, unit_of_measuring, prise, nameOFCompany) 
               VALUES('$code_fuel','$fuel_type', '$unit_of_measuring','$prise','$FuelsupliseSelected') ";
               $result = $connection->query($query);

               $query = "select * from fuel";
               QueryRQSULT($query, $connection);
               break;
            case "delite":
               $query = "DELETE FROM fuel where code_fuel='$code_fuel' ;";
               $result = $connection->query($query);

               $query = "select * from fuel";
               QueryRQSULT($query, $connection);
               break;
         }

         break;










































      default:
         echo "Your favorite color is neither red, blue, nor green!";
   }
}


?>