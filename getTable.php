<?php
    

    function compare($a,$b){
        $c = $b;
        $password;
        $table = "";
        $d = "Jeremiah72*";
        $sql;
        
            
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


        if ($a == $d) {
            $sql = "SELECT * FROM test9 WHERE password='Jeremiah72*'"; 
        } 
        

        $stmt = sqlsrv_query($conn, $sql); 
        if($stmt === false) 
            { 
            die(print_r(sqlsrv_errors(), true)); 
            } 
 
        if(sqlsrv_has_rows($stmt)) 
        { 
            while($row = sqlsrv_fetch_array($stmt)) //!= NULL
                { 
                $table = $row[1];
                } 
            return $table;
  
        }
    }


    $aResult = array();

    if( !isset($_POST['functionname']) ) { $aResult['error'] = 'No function name!'; }

    if( !isset($_POST['arguments']) ) { $aResult['error'] = 'No function arguments!'; }

    if( !isset($aResult['error']) ) {

        switch($_POST['functionname']) {
            case 'compare':
               if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 2) ) {
                   $aResult['error'] = 'Error in arguments!';
               }
               else {
                   $aResult['result'] = compare(strval($_POST['arguments'][0]), floatval($_POST['arguments'][1]));
               }
               break;

            default:
               $aResult['error'] = 'Not found function '.$_POST['functionname'].'!';
               break;
        }

    }

    echo json_encode($aResult);

?>


