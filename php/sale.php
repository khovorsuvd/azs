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
$action = htmlentities($_POST["action"]);
         $query = "select * from worker where position='seller'";
         $result = $connection->query($query);
         $response = array();

         if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
               $worker = array(
                  'id_worker' => $row["id_worker"],
                  'worker_name' => $row["worker_name"]
               );
               $response['workers'][] = $worker;
            }
         }

         $query = "select * from product";
         $result = $connection->query($query);

         if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
               $product = array(
                  'product_id' => $row["product_id"],
                  'product_title' => $row["product_title"]
               );
               $response['products'][] = $product;
            }
         }

         $query = "select * from sale";
         $result = $connection->query($query);
   
         if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
               $sale = array(
                  'date_of_sale' => $row["date_of_sale"],
                  'code_fuel' => $row["code_fuel"],
                  'quantityFuel' => $row["quantityFuel"],
                  'worker' => $row["worker"],
                  'summ' => $row["summ"]
               );
               $response['sales'][] = $sale;
            }
         }


      
         echo json_encode($response)
?>