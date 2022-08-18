<?

// PHP Data Objects(PDO) Sample Code:

//extension_dir = "\SQLSRV510";

//extension=php_sqlsrv_72_ts.dll;

//extension=php_pdo.dll;

$ip = $_POST["ipAdd"];
$locations = $_POST["locations"];
$visit = $_POST["visit"];
$pgOne = $_POST["pgOne"];

echo "happened";

try {
    $conn = new PDO("sqlsrv:server = tcp:jbsdatatest.database.windows.net,1433; Database = JBsDataTest", "jbmoneysweg", "Jeremiah72*");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "jbmoneysweg", "pwd" => "Jeremiah72*", "Database" => "JBsDataTest", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:jbsdatatest.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);

$sql = "INSERT INTO website3 (ip, locations, visit, pg1) VALUES ($ip, $locations, $visit, $pgOne)";

//$sql = ("SELECT * from ArchAutoParts_1 where ID='100.12.176.77'")


//$params = array($ip, $locations, $visit, $pgOne);

sqlsrv_query($conn, $sql);

//if( $stmt === false ) {
  //   die( print_r( sqlsrv_errors(), true));
//}
//echo "Connected Succesfully";

echo "Did it";

?>