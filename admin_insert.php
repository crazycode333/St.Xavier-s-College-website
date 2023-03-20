<?php
if(isset($_POST["submit"]))
{
    $name=$_POST["name"];
    $registration=$_POST["registration_no"];
    $exam=$_POST["exam_roll"];
    $roll=$_POST["class_roll"];
    $program=$_POST["program"];
    $course=$_POST["course"];
    $sem=$_POST["semester"];
    $session=$_POST["session"];
    $payment=$_POST["payment"];
    $mobile=$_POST["mobile"];
    $email=$_POST["email"];
    $password=$_POST["pass"];





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
                $sql = "INSERT INTO `student`(`Name`, `Registration_No`, `Exam_Roll_No`, `Class_Roll_No`, `Program`, `Course`, `Semester`, `Session`, `Payment_Due`, `Mobile_No`, `Email`, `Password`) VALUES ('$name','$registration','$exam','$roll','$program','$course','$sem','$session','$payment','$mobile','$email','$password');";
                if($conn ->query($sql)===true)
                    {
                        echo" ";

                    }
            }

        else
            { 
                
                $q="CREATE TABLE `test`.`student` (`Name` VARCHAR(20) NOT NULL , `Registration_No` VARCHAR(20) NOT NULL , `Exam_Roll_No` VARCHAR(20) NOT NULL , `Class_Roll_No` INT(20) NOT NULL , `Program` VARCHAR(20) NOT NULL , `Course` VARCHAR(20) NOT NULL , `Semester` INT(20) NOT NULL , `Session` TEXT NOT NULL , `Payment_Due` TEXT NOT NULL , `Mobile_No` INT(20) NOT NULL , `Email` TEXT NOT NULL , `Password` VARCHAR(20) NOT NULL ) ENGINE = InnoDB";
                $r=$conn->query($q);
                
                $sql = "INSERT INTO `student`(`Name`, `Registration_No`, `Exam_Roll_No`, `Class_Roll_No`, `Program`, `Course`, `Semester`, `Session`, `Payment_Due`, `Mobile_No`, `Email`, `Password`) VALUES ('$name','$registration','$exam','$roll','$program','$course','$sem','$session','$payment','$mobile','$email','$password');";
                if($conn ->query($sql)===true)
                    {
                        echo" ";

                    }
        
            }
            echo"
            <html>
            <body bgcolor='wheat'>
            <center>
            <h1>New Student Has Been Register<h1>
            <h3>Data Saved Successfully!!!!!<h3>
            </center>
            </body>
            </html>
            ";

        
    }
    $conn->close();

}
?>