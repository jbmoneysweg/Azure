<?php
    

    function compare($a,$b){
        $sql;
        $Ips = array();
        $locations = array();
        $visitTimes = array();
        $pages = array();
        $visits = array();
        $carrier = array();
            
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


        
            $sql = "SELECT * FROM ".$a;  
        
        

        $stmt = sqlsrv_query($conn, $sql); 
        if($stmt === false) 
            { 
            die(print_r(sqlsrv_errors(), true)); 
            } 
 
        if(sqlsrv_has_rows($stmt)) 
        { 
            while($row = sqlsrv_fetch_array($stmt)) //!= NULL
                {
                array_push($Ips, $row[0]);
                array_push($visitTimes, $row[1]);
                array_push($pages, $row[2]);
                array_push($locations, $row[3]);
                array_push($visits, $row[4]);
                
                } 
            $carrier[0] = $Ips;
            $carrier[1] = $visitTimes;
            $carrier[2] = $pages;
            $carrier[3] = $locations;
            $carrier[4] = $visits;
            return $carrier;
  
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
