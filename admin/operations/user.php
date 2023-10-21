<?php
include('../check_login.php');
?>
<?php
include"../config.php";
 //
try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         //echo "sdfsdf<pre>"; print_r($_POST); exit;
         if(isset($_POST['submit']))
         {

            function createSalt()
             {
               return '2123293dsj2hu2nikhiljdsd';
             }
         $passw = hash('sha256', $_POST['val-password']);
         $salt = createSalt();
         $pass = hash('sha256', $salt . $passw);
        echo $sql = "INSERT INTO users(name, email, password,confpassword)
            VALUES ('".$_POST['val-username']."','".$_POST['val-email']."', '".$pass."','".$pass."')";
            // use exec() because no results are returned
            $conn->exec($sql);


                // if ($pass != $_POST['val-confirm-password'])
                //  {
                //    echo("Error... Passwords do not match");
                //  }


              //echo "<pre>";print_r($conn);exit;
           $_SESSION['success']='Rekod baharu berjaya dibuat';
            // $_SESSION['reply'] = "Added Successfully";
        header("location:../users.php");
    }
    if(isset($_POST['update']))

    {

// echo $_POST['val-password']; exit;
            if($_POST['val-password']!='')
            {
             function createSalt()
             {
               return '2123293dsj2hu2nikhiljdsd';
             }
         $passw = hash('sha256', $_POST['val-password']);
         $salt = createSalt();
         $password = hash('sha256', $salt . $passw);

          }
           else
      {
         $password=$_POST['old_pass'];
      }

       $sql = "UPDATE users SET name='".$_POST['val-username']."',
    email='".$_POST['val-email']."',
    password='".$password."'
     WHERE id='".$_GET['edit_id']."'";
    // Prepare statement
     //echo "<pre>";print_r($sql);exit;
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();
    $_SESSION['success']='Rekod berjaya dikemas kini';
     // $_SESSION['reply'] = "Added Successfully";
        header("location:../users.php");
    }
    if(isset($_GET['id']))
    {
        $sql = "DELETE FROM users WHERE id='".$_GET['id']."'";

            // use exec() because no results are returned
            $conn->exec($sql);
             $_SESSION['success']='Rekod berjaya dipadamkan';
            // echo "Record deleted successfully";
            //  $_SESSION['reply'] = "Record deleted successfully";
        header("location:../users.php");
    }
}
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }


  echo "string";  exit;

$conn = null;
?>
