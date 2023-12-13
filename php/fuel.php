<?php
header("Access-Control-Allow-Origin: *");
?>
<?php


$host = 'localhost:3307'; 
$username = 'root';
$password = '1111';

$database = 'azs';

$connection = new mysqli($host, $username, $password, $database);
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


?>