<?
// PHP Data Objects(PDO) Sample Code:

//extension_dir = "\SQLSRV510";

//extension=php_sqlsrv_72_ts.dll;

//extension=php_pdo.dll;

$ip = $_POST["ipAdd"];
$locations = $_POST["locations"];
$visit = $_POST["visit"];
$pgOne = $_POST["pgOne"];
$busName = $_POST["busName"];
$visit = 1;

$serverName = "jbsdatatest.database.windows.net";  
$connectionOptions = array(  
    "Database" => "JBsDataTest",  
    "UID" => "jbmoneysweg",  
    "PWD" => "Jeremiah72*"  
);  
$conn = sqlsrv_connect($serverName, $connectionOptions);  
  


        /*Insert data.*/  
        $insertSql = "INSERT INTO test15 (Ip,locations,visit,page,business)   
VALUES (?,?,?,?,?)";  
        $params = array($ip, $locations, $visit, $pgOne, $busName
        );  
        $stmt = sqlsrv_query($conn, $insertSql, $params);  
        if ($stmt == false) {
                die(print_r($errors, true));       
            }  
          else  
            {  
            echo "Registration complete.</br>";  
            }  
?>
