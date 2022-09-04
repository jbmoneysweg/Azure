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
$time = 0;
$value = 0;
$sendback = "";

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


$sql = "SELECT * FROM test7"; 
//$sql = "SELECT * FROM test5"; 
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
$time = $row[time] + $time;
$value = $row[value] + $value;
$visit = $visit + 1;
} 
  $time = $time / $visit;
  $value =  $value / $visit;
  $sendback = $time + "." + $value;
}
//$visit = intval($visit);
?>