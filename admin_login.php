<?php
if(isset($_POST["submit"]))
{
    $username=$_POST["username"];
    $password=$_POST["password"];


    $host="localhost";
    $user="root";
    $pass="";
    $dbname="test";
    $conn=new mysqli($host,$user,$pass,$dbname);
    if($conn->connect_error)
    { echo"<br>not connected<br>";
        die("connection unset".$conn->connect_error);
    }
    else{
        echo "connected";
    }
    // SQL query
    $sql = "SHOW TABLES IN `test` WHERE `Tables_in_test` = 'admin_login'"; 

    // perform the query and store the result
    $result = $conn->query($sql);
    // if the $result not False, and contains at least one row
    if($result !== false) 
    {
        // if the $result contains at least one row, the table exists, otherwise, not exist
        if ($result->num_rows > 0) 
            {
                echo " <br>table exits with some data";
            }
        else
        {
            $q="CREATE TABLE `test`.`admin_login` (`Name` TEXT NOT NULL , `Password` TEXT NOT NULL ) ENGINE = InnoDB;";
            if($conn ->query($q)===true)
                    {
                        echo"<br>table created ";

                    }
            $p="INSERT INTO `admin_login`(`Name`, `Password`) VALUES ('aj','123');";
            if($conn ->query($p)===true)
                    {
                        echo"<br>row inserted";

                    }


        }

        $k="SELECT * FROM `admin_login` WHERE `Name`='$username' and `Password`='$password';";
        $r=$conn->query($k);
        if($r !== false) 
        {
        // if the $result contains at least one row, the table exists, otherwise, not exist
        if ($r->num_rows > 0)       
                    {
                        echo"<br>valid login";
                        header('Location: //localhost/ccl project/admin_insert.html');
                        exit();

                    }
        else
        {
            
            echo"<br>invalid login";
            echo"
                <html>
                <body bgcolor='wheat'>
                <center>
                <h1>Invalid Userid Or Password<h1>
                <h3> please try again with correct user id and password<h3>
                </center>s
                </body>
                </html>
                ";
        }
        }

    }




    $conn->close();

}

?>