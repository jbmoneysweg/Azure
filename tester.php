<?

// PHP Data Objects(PDO) Sample Code:

//extension_dir = "\SQLSRV510";

//extension=php_sqlsrv_72_ts.dll;

//extension=php_pdo.dll;

$ip = $_POST["ipAdd"];
$locations = $_POST["locations"];
$visit = $_POST["visit"];
$pgOne = $_POST["pgOne"];
$visit = 1;

$serverName = "jbsdatatest.database.windows.net";  
$connectionOptions = array(  
    "Database" => "JBsDataTest",  
    "UID" => "jbmoneysweg",  
    "PWD" => "Jeremiah72*"  
);  
$conn = sqlsrv_connect($serverName, $connectionOptions);  
  

if ($conn === false)  
    {  
    die(print_r(sqlsrv_errors() , true));  
    }  


//$sql = "SELECT * FROM test5 WHERE Ip = " + $ip; 
$sql = "SELECT * FROM test5"; 
$stmt = sqlsrv_query($conn, $sql); 
if($stmt === false) 
{ 
die(print_r(sqlsrv_errors(), true)); 
} 
 
if(sqlsrv_has_rows($stmt)) 
{ 
    /*
print("<table border='1px'>"); 
print("<tr><td>Emp Id</td>"); 
print("<td>Name</td>"); 
print("<td>education</td>"); 
print("<td>Email</td></tr>"); 
 */
while($row = sqlsrv_fetch_array($stmt) != NULL) //!= NULL
{ 
if ($row['Ip'] == $ip) {
    $visit = $visit + 1;
}
} 
  
}
//$visit = intval($visit);


        /*Insert data.*/  
        $insertSql = "INSERT INTO test5 (Ip,locations,visit,page)   
VALUES (?,?,?,?)";  
        $params = array($ip, $locations, $visit, $pgOne  
        );  
        $stmt = sqlsrv_query($conn, $insertSql, $params);  
        if ($stmt === false)  
            {  
            /*Handle the case of a duplicte e-mail address. */ 
            $errors = sqlsrv_errors();  
            if ($errors[0]['code'] == 2601)  
                {  
                echo "The e-mail address you entered has already been used.</br>";  
                }  
  
            /*Die if other errors occurred.*/  
              else  
                {  
                die(print_r($errors, true));  
                }  
            }  
          else  
            {  
            echo "Registration complete.</br>";  
            }  
?>
