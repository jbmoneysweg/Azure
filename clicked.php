<?

// PHP Data Objects(PDO) Sample Code:

//extension_dir = "\SQLSRV510";

//extension=php_sqlsrv_72_ts.dll;

//extension=php_pdo.dll;

$company = $_POST["company"];
$button = $_POST["button"];
$table = $_POST["tableName"];

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


        /*Insert data.*/  
        $insertSql = "INSERT INTO ".$table." (Company,Button)   
VALUES (?,?)";  
        $params = array($company, $button  
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
