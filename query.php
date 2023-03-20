<?php



if(isset($_POST["submit"]))
{
    
    $fname=$_POST["firstname"];
    $lname=$_POST["lastname"];
    $eid=$_POST["mailid"];
    $feed=$_POST["subject"];
    


    $host="localhost";
    $user="root";
    $pass="";
    $dbname="test";
    $conn=new mysqli($host,$user,$pass,$dbname);
    if($conn->connect_error)
    { echo"<br>not connected<br>";
        die("connection unset".$conn->connect_error);
    }


    // SQL query
    $sql = "SHOW TABLES IN `test` WHERE `Tables_in_test` = 'query'"; 

    // perform the query and store the result
    $result = $conn->query($sql);

// if the $result not False, and contains at least one row
    if($result !== false) 
    {
 // if the $result contains at least one row, the table exists, otherwise, not exist
    if ($result->num_rows > 0) 
    {
        echo '.';
    }

    else
    { 
        
        $q="CREATE TABLE `test`.`query` (`First name` VARCHAR(20) NOT NULL , `Last name` VARCHAR(20) NOT NULL , `Email ID` VARCHAR(50) NOT NULL , `query` VARCHAR(200) NOT NULL , `no` INT(10) NOT NULL ) ENGINE = InnoDB";
        $r=$conn->query($q);
        

    }
    $p="INSERT INTO `query`(`First name`, `Last name`, `Email ID`, `query`) VALUES ('$fname','$lname','$eid','$feed')";
    if($conn ->query($p)===true)
    {
        
        echo "
            <html>
            <body bgcolor='wheat'>
            <center>
            <h1>Thank You For Reaching Out To Us</h1>
            <h3> your query is submitted sucessfully</h3>
            <h4>Conserned team will contact you within 48 hours</h4>
            
            </center>
            </body>
            </html>";

    }
    else
        {echo "
            <html>
            <body >
            <center>
            <h1> your feedback is submitted sucessfully!!!</h1>
            </center>
            </body>
            </html>";
        }



    }



    else echo 'Unable to check the "tests", error - '. $conn->error;

    $conn->close();
}
else{
    echo"no";
}
?>