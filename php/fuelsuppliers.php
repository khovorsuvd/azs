<?php
header("Access-Control-Allow-Origin: *");
?>
<?php


$host = 'localhost:3307'; 
$username = 'root';
$password = '1111';

$database = 'azs';

$connection = new mysqli($host, $username, $password, $database);
$action = htmlspecialchars($_POST["action"]);
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
$connection->close();

?>