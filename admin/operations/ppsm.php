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


    //if(isset($_POST['submit']))
    //{




      //  $sql = "INSERT INTO datepbsm (date)
          //  VALUES ('".$_POST['date']."')";
            // use exec() because no results are returned
          //  $conn->exec($sql);
          //  echo "Rekod baharu berjaya dibuat";
            // $_SESSION['reply'] = "Added Successfully";
      //  header("location:../date.php");
  //  }
    if(isset($_POST['update']))

    {

        $sql = "UPDATE ppsm SET
         id='".$_POST['id']."',
        noppsm='".$_POST['noppsm']."'

     WHERE id='".$_GET['edit_id']."'";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();
     $_SESSION['success'] = "Rekod berjaya dikemas kini";
        header("location:../ppsm1.php");
    }
    if(isset($_GET['id']))
    {
        $sql = "DELETE FROM ppsm ";

            // use exec() because no results are returned
            $conn->exec($sql);
            // echo "Record deleted successfully";
            $_SESSION['success']=' Rekod berjaya dipadamkan';
        header("location:../ppsm1.php");
    }
}
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }




$conn = null;
?>
