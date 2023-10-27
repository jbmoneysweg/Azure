<?
// PHP Data Objects(PDO) Sample Code:

//extension_dir = "\SQLSRV510";

//extension=php_sqlsrv_72_ts.dll;

//extension=php_pdo.dll;


$ip = $_POST["ips"];
$locations = $_POST["locations"];
$visits= $_POST["visit"];
$pages = $_POST["pages"]
$timestamp = $_POST["time"];
$table = $_POST["table"];
$visit =  0;
$visitoff = 0;

$serverName = "jbsdatatest.database.windows.net";  
$connectionOptions = array(  
    "Database" => "JBsDataTest",  
    "UID" => "jbmoneysweg",  
    "PWD" => "Jeremiah72*"  
);  
$conn = sqlsrv_connect($serverName, $connectionOptions);  
  
if ($conn == false)  
    {  
    die(print_r(sqlsrv_errors() , true));  
    }  


//$sql = "SELECT * FROM test15 WHERE Ip='" + strval($ip) + "'";
$sql = "SELECT * FROM ".$table." WHERE Ip= '".$ip."'";
//$sql = "SELECT * FROM test15"; 
$stmt = sqlsrv_query($conn, $sql); 
if($stmt == false) 
{ 
die(print_r(sqlsrv_errors(), true)); 
} 
 
if(sqlsrv_has_rows($stmt)) 
{
while($row = sqlsrv_fetch_array($stmt) != NULL) //!= NULL
{ 

    $visitoff = $row[4]
    $dat = new DateTime($timestamp);
    $dat2 = new DateTime($row[1])
    $dat2->add(new DateInterval('PT' . $minutes_to_add . 'M'));
    $stamp = $dat2->format('Y-m-d H:i');
    if ($stamp > $dat) {
    $visit = $row[4];
    }
    
} 

if ($visit == 0) {
  $visit = $visitoff;
}

if ($visit == 0 && $visitoff == 0) {
    $visit = 0;
}

//$visit = intval($visit);

/*Insert data.*/  
        $insertSql = "INSERT INTO ".$table." (ip,visittime,page,location,visits)   
VALUES (?,?,?,?,?,?)";  
        $params = array($ip,$timestamp,$pages,$locations,$visit);  
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
