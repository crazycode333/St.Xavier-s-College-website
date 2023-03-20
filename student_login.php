<?php



if(isset($_POST["submit"]))
{
    $loginid=$_POST["username"];
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
    

    // SQL query
    $sql = "SHOW TABLES IN `test` WHERE `Tables_in_test` = 'student'"; 

    // perform the query and store the result
    $result = $conn->query($sql);

    // if the $result not False, and contains at least one row
    if($result !== false) 
    {
        // if the $result contains at least one row, the table exists, otherwise, not exist
        if ($result->num_rows > 0) 
            {
                echo " ";
            }

        else
            { 
                
                $q="CREATE TABLE `test`.`student` (`Name` VARCHAR(20) NOT NULL , `Registration_No` VARCHAR(20) NOT NULL , `Exam_Roll_No` VARCHAR(20) NOT NULL , `Class_Roll_No` INT(20) NOT NULL , `Program` VARCHAR(20) NOT NULL , `Course` VARCHAR(20) NOT NULL , `Semester` INT(20) NOT NULL , `Session` TEXT NOT NULL , `Payment_Due` TEXT NOT NULL , `Mobile_No` INT(20) NOT NULL , `Email` TEXT NOT NULL , `Password` VARCHAR(20) NOT NULL ) ENGINE = InnoDB";
                $r=$conn->query($q);
                
                $sql = "INSERT INTO `student`(`Name`, `Registration_No`, `Exam_Roll_No`, `Class_Roll_No`, `Program`, `Course`, `Semester`, `Session`, `Payment_Due`, `Mobile_No`, `Email`, `Password`) VALUES ('Amarjeet','20SXVBIT044496','20VBIT044496','801','UG','B.SC IT','6','2020-2023','NO','9402563873','amar@gmail.com','amar435');";
                if($conn ->query($sql)===true)
                    {
                        echo" ";

                    }
        
            }
        $q="SELECT * FROM `student` WHERE `Exam_Roll_No`='$loginid' AND `Password`='$password';";
        if ($result_set = $conn->query($q)) 
        {
            if($result_set->num_rows>0)
            { echo" ";
                while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                    {
echo"
<html>
<style>
table, th, td {
  border:1px solid black;
}
body{
    width:70%;
    margin: 0 auto;
}
h1{
color:red;
}
table{
    color:blue;
}
</style>
<center><h1>Student Information</h1></center>
<body bgcolor='wheat'>



<table style='width:100%'>
  <tr>
    <td>Student Name</td>
    <td>$row[Name]</td>
    
  </tr>
  <tr>
  <td>Registration No</td>
  <td>$row[Registration_No]</td>
    
  </tr>
  <tr>
  <td>Exam Roll No</td>
  <td>$row[Exam_Roll_No]</td>
    
  </tr>
  <tr>
  <td>Class Roll No </td>
  <td> $row[Class_Roll_No]</td>
  </tr>
  <tr>
  <td> Program</td>
  <td> $row[Program]</td>
</tr>
<tr>
<td>Course</td>
<td>$row[Course] </td>
  </tr>
  <tr>
  <td>Semester </td>
  <td>$row[Semester] </td>
</tr>
<tr>
<td> Session</td>
<td>$row[Session] </td>
  </tr>
  <tr>
  <td>Payment Due </td>
  <td> $row[Payment_Due]</td>
</tr>
<tr>
<td>Mobile No </td>
<td> $row[Mobile_No]</td>
  </tr>
  <tr>
  <td> Email </td>
  <td> $row[Email]</td>
</tr>
</table>



</body>
</html>
";

                        

                      
                        
                    }
            }
            else
            {
                
                echo"
                <html>
                <body bgcolor='wheat'>
                <center>
                <h1>Invalid Userid Or Password<h1>
                <h3> please try again with correct user id and password<h3>
                </center>
                </body>
                </html>
                ";
            }
        }
        
        

    }
    else echo 'Unable to check the "tests", error - '. $conn->error;

    $conn->close();



}
?>