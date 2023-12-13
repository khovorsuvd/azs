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

               $query = "DELETE FROM product where product_title='$productTitle' or prise='$productPrise';";
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

         $connection->close();

?>