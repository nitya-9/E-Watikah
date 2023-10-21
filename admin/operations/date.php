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

        $sql = "UPDATE datepbsm SET
         id='".$_POST['id']."',
        date='".$_POST['date']."'

     WHERE id='".$_GET['edit_id']."'";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();
     $_SESSION['success'] = "Rekod berjaya dikemas kini";
        header("location:../datepbsm.php");
    }
    if(isset($_GET['id']))
    {
        $sql = "DELETE FROM datepbsm ";

            // use exec() because no results are returned
            $conn->exec($sql);
            // echo "Record deleted successfully";
            $_SESSION['success']=' Rekod berjaya dipadamkan';
        header("location:../date.php");
    }
}
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }




$conn = null;
?>
