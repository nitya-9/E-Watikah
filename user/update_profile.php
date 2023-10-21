<?php
require_once('check_login.php');
?>
<?php include"header.php"?>

<?php include"sidebar.php"?>
<?php
include"config.php";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  if(isset($_SESSION['id']))
    {
      $id=$_SESSION['id'];
      $stmt = $conn->prepare("select * from users where id='".$_SESSION['id']."'");
      $stmt->execute();

      $row=$stmt->fetch(PDO::FETCH_ASSOC);
      $id=$row['id'];
      $name=$row['name'];
      $email=$row['email'];
      $password=$row['password'];
      $confpassword=$row['confpassword'];



    $stmt9 = $conn->prepare("SELECT id,state_name FROM travellers group by state_name");
    $stmt9->execute();

    $result9 = $stmt9->setFetchMode(PDO::FETCH_ASSOC);
    $state=$stmt9->fetchAll();


    }
    }



catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();

  header("location:../update_profile.php");
    }

$conn = null;
?>
?>

<!DOCTYPE html>
<html lang="en">



<div class="page-wrapper">
 <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Kemaskini Profil</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Kemaskini Profil</a></li>
                        <li class="breadcrumb-item active">Papan Pemuka</li>
                    </ol>
                </div>
            </div>
    <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-primary">

                            <div class="card-body">
                              <form method="post" action="user_operations/profile.php?id=<?php echo $id;?>" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <h3 class="card-title m-t-15">Kemaskini Profil</h3>
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                             <label class="control-label">Nama</label>
                                              <input type="text" value="<?php echo $name;?>" name="name" class="form-control">
                                                    </div>
                                            </div>

                                            <div class="col-md-6">
                                              <div class="form-group">
                                           <label class="control-label">E-mel</label>
                                            <input type="text" value="<?php echo $email;?>" name="email" class="form-control">
                                                  </div>
                                            </div>

                                        </div>


                                         <!--div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                   <label class="control-label"> Mobile</label>
                                                       <input type="text" name="mobile" value="<?php echo $mobile;?>" pattern="^[0][1-9]\d{9}$|^[1-9]\d{9}$"  maxlength="10" class="form-control">
                                                    </div>
                                            </div>

                                             <div class="col-md-6">
                                                <div class="form-group">
                                                   <label class="control-label">Address</label>
                                                       <textarea class="form-control" id="val-suggestions" name="address" rows="5" ><?php echo $address;?></textarea>
                                                    </div>
                                            </div>

                                        </div>

                                         <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                  <label class="control-label">Image</label>
                                    <input type="file" name="img" class="form-control">
                                      <img src="../admin/img/<?php echo $img;?>" width="150" height="150">
                                       <input type="hidden" name="old_img" value="<?php echo $img;?>">
                                                    </div>
                                            </div>

                                        </div-->

                                    </div>
                                    <div class="form-actions">

                                        <button type="submit" class="btn btn-success" name="update"> <i class="fa fa-check"></i>Kemaskini</button>
                                        <a href="update_profile.php"><button type="button" class="btn btn-inverse">Batal</button></a>
                                    </div>
                                </form>
                            </div>
                        </div>

 </div>
</div>
</div>
</body>

</html>


<?php include"footer.php"?>



<?php if(!empty($_SESSION['success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Berjaya
    </h1>
    <p><?php echo $_SESSION['success']; ?></p>
    <p>
       <?php echo "<script>
  setTimeout(\"location.href='update_profile.php'\", 2000);

</script>"?>
    </p>
  </div>
</div>
<?php unset($_SESSION["success"]);
} ?>
<?php if(!empty($_SESSION['error'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Ralat
    </h1>
    <p><?php echo $_SESSION['error']; ?></p>
    <p>
     <?php echo "<script>
  setTimeout(\"location.href='update_profile.php'\", 2000);

</script>"?>
    </p>
  </div>
</div>
<?php unset($_SESSION["error"]);  } ?>
 <script>
      var addButtonTrigger = function addButtonTrigger(el) {
  el.addEventListener('click', function () {
    var popupEl = document.querySelector('.' + el.dataset.for);
    popupEl.classList.toggle('popup--visible');
  });
};

Array.from(document.querySelectorAll('button[data-for]')).
forEach(addButtonTrigger);
    </script>
