<?php
require_once('../check_login.php');
?>
<?php
include"../config.php";
date_default_timezone_set('Asia/Kolkata');
$current_date=date('Y-m-d');

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    if(isset($_POST['update']))

    {

        $sql = "UPDATE candidate3 SET   status='".$_POST['status']."'    WHERE id='".$_GET['edit_id']."'";



    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();
     $_SESSION['success'] = "Status berjaya dikemas kini";
        header("location:../status3.php");
    }


}
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }




$conn = null;
?>
