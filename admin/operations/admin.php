<?php session_start();?>
<?php
include"../config.php";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST['btn_login']))
    {
        $sql = "INSERT INTO admin (uname, email, password,fname,lname,contact)
            VALUES ('".$_POST['uname']."', '".$_POST['email']."', '".$_POST['password']."','".$_POST['fname']."','".$_POST['lname']."' , '".$_POST['contact']."')";
            // use exec() because no results are returned
            $conn->exec($sql);
             $_SESSION['success']=' Rekod Berjaya Ditambah .....';
             header("location:../page-login.php");
            // echo "Rekod baharu berjaya dibuat";
        //     $_SESSION['reply'] = "Berjaya Ditambah ";
        // header("location:../admin.php");
    }


    if(isset($_POST['update']))

    {

     $sql = "UPDATE admin SET fname='".$_POST['fname']."',
    lname='".$_POST['lname']."',
    email='".$_POST['email']."',
    contact='".$_POST['contact']."',

     WHERE id='".$_GET['id']."'";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();
      $_SESSION['success']=' Rekod Berjaya Dikemaskini......';
     // $_SESSION['reply'] = "Berjaya dikemas kini";
        header("location:../update_profile.php");
    }


  }
    catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }





$conn = null;
?>
