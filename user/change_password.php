<?php
require_once('check_login.php');
?>
<?php include"header.php"?>

<?php include"sidebar.php"?>
 <?php
 include('config.php');
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM users where id='".$_SESSION['id']."'");
    $stmt->execute();
     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $data=$stmt->fetch(PDO::FETCH_ASSOC);
    $db_pass = $data['password'];
     if(isset($_POST["submit"]))
       {

           $old = hash('sha256',$_POST['old_password']);
           $pass_new = hash('sha256', $_POST['new_password']);
           $confirm_new = hash('sha256', $_POST['confirm_password']);


function createSalt()
{
    return '2123293dsj2hu2nikhiljdsd';
}
$salt = createSalt();
$old_pass =  hash('sha256', $salt . $old);
$new_pass =  hash('sha256', $salt . $pass_new);
$confirm =  hash('sha256', $salt . $confirm_new);

  if($db_pass!=$old_pass){ ?>
   <div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Ralat
    </h1>
    <h2>Kata Laluan Lama Tidak Dipadankan</h2>
    <p>
      <?php echo "<script>
  setTimeout(\"location.href='change_password.php'\", 2000);

</script>"?>
    </p>
  </div>
</div>

  <?php } else if($new_pass!=$confirm){ ?>
     <div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Ralat
    </h1>
    <h2>Kata Laluan Baharu dan Sahkan Kata Laluan Tidak Padan</h2>
    <p>
      <?php echo "<script>
  setTimeout(\"location.href='change_password.php'\", 2000);

</script>"?>
    </p>
  </div>
</div>

  <?php } else {


         $abc = "UPDATE users SET `password`='$confirm' where id = '".$_SESSION['id']."'";


    $stmt = $conn->prepare($abc);


    $stmt->execute();

  ?>

  <div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Berjaya </h3>
    </h1>
    <h2>Berjaya Tukar Kata Laluan</h2>
    <p>

     <?php echo "<script>setTimeout(\"location.href = 'change_password.php';\",1500);</script>"; ?>
    </p>
</div>
</div>

  <?php

  }
}
}

catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }




$conn = null;

?>

        <div class="page-wrapper">

            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Tukar Katalaluan</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Tukar Katalaluan</a></li>
                        <li class="breadcrumb-item active">Papan Pemuka</li>
                    </ol>
                </div>
            </div>


             <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-primary">

                            <div class="card-body">
                              <form  method="post">
                                    <div class="form-body">
                                        <h3 class="card-title m-t-15">Tukar Katalaluan</h3>
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Katalaluan Lama</label>
                                                    <input type="password" class="form-control" id="val-password" name="old_password" placeholder="Masukkan kata laluan lama.." required>
                                                    </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Katalaluan Baharu</label>
                                                      <input type="password" class="form-control" id="val-confirm-password" name="new_password" placeholder="..Masukkan kata laluan Baharu!" required>
                                                    </div>
                                            </div>

                                        </div>


                                        <div class="row p-t-20">
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Sahkan Kata Laluan</label>
                                                <input type="password" class="form-control" id="val-confirm-password" name="confirm_password" placeholder="..dan mengesahkannya!" required>
                                                    </div>
                                            </div>


                                        </div>

                                    </div>
                                    <div class="form-actions">

                                       <button type="submit" class="btn btn-success" name="submit"> <i class="fa fa-check" ></i> Kemaskini</button>
                                        <a href="change_password.php"><button type="button" class="btn btn-inverse">Batal</button></a>
                                    </div>
                                </form>
                            </div>
                        </div>

 </div>
</div>
</div>


<?php include"footer.php"?>
