<?php
header("Access-Control-Allow-Origin: *");
?>
<?php

$host = 'localhost:3307'; 
$username = 'root';
$password = '1111';

$database = 'azs';

$connection = new mysqli($host, $username, $password, $database);




$action = $_POST["action"];
$workerjob = $_POST["workerjob"];
$workername = $_POST["workername"];
$workerdateofbirth = $_POST["workerdateofbirth"];
$workertel = $_POST["workertel"];
$workerdateofhirning = $_POST["workerdateofhirning"];
$mesqlf = $_POST["sql"];

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
};
switch ($action) {
    case "add":
        $query = "INSERT INTO Worker (position,worker_name,date_of_birth,tel,date_of_offer) VALUES('$workerjob','$workername', '$workerdateofbirth','$workertel','$workerdateofhirning') ";
        $result = $connection->query($query);

        $query = "select * from Worker";
        QueryRQSULT($query, $connection);

        break;
        case "sqlbutton":
            $query ="$mesqlf";
            $result = $connection->query($query);
    
           
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
};






$connection->close();
?>