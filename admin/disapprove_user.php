<?php
require_once('check_login.php');
?>
<?php include"header.php"?>

<?php include"sidebar.php"?>
<?php
 include('config.php');
 try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


     if(isset($_GET['id']))

    {
       $id=$_GET['id'];
      $stmt = $conn->prepare("select * from users where id='".$_GET['id']."'");
      $stmt->execute();
      //$row1=$stmt->setFetchMode(PDO::FETCH_ASSOC);
      $row=$stmt->fetch(PDO::FETCH_ASSOC);

        $sql = "UPDATE users SET status='Deactivate'
      WHERE id='".$_GET['id']."'";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();
     $_SESSION['error']='Pengguna Berjaya Tidak Diaktifkan...';
     // $_SESSION['reply'] = "Disapproved Successfully";
        // header("location:../disapproveuser_entry.php");
     ?>
      <script type="text/javascript">
      window.location="disapproveuser_entry.php"
    </script>
    <?php
    }
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();

    }

$conn = null;
?>
