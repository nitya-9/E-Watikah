<?php include"header.php"?>

<?php include"sidebar.php"?>
<?php
 include('config.php');
 try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  if(isset($_GET['id']))
    {
      $id=$_GET['id'];
      $stmt = $conn->prepare("select * from users where id='".$_GET['id']."'");
      $stmt->execute();

      $row=$stmt->fetch(PDO::FETCH_ASSOC);
      $id=$row['id'];
      $name=$row['name'];
      $email=$row['email'];
      $password=$row['password'];
      $confpassword=$row['confpassword'];



    //$stmt9 = $conn->prepare("SELECT * FROM travellers group by state_name");
    //$stmt9->execute();

    //$result9 = $stmt9->setFetchMode(PDO::FETCH_ASSOC);
    //$state=$stmt9->fetchAll();
    $state=$stmt->fetchAll();



    }


    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
     $_SESSION['reply'] = "Berjaya Dikemas Kini";
  header("location:../users.php");
    }

$conn = null;
?>



        <div class="page-wrapper">

            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Kemas Kini Maklumat Pengguna</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Kemas Kini Maklumat Pengguna</a></li>
                        <li class="breadcrumb-item active">Papan Pemuka</li>
                    </ol>
                </div>
            </div>


           <div class="container-fluid">

                <div class="row">
                      <div class="col-lg-12">
                        <div class="card card-outline-primary">

                            <div class="card-body">

                                    <form action="operations/user.php?edit_id=<?php echo $id;?>" method="post" enctype="multipart/form-data" >
                                    <div class="form-body">
                                        <h3 class="card-title m-t-15">Maklumat Pengguna</h3>
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Nama</label>
                                                   <input type="text" class="form-control"  value="<?php echo $name;?>" name="val-username" pattern= "[a-zA-Z][a-zA-Z ]+" placeholder="Masuk Nama" required>
                                                    </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">E-mel</label>
                                                     <input type="text" class="form-control"  value="<?php echo $email; ?>" name="val-email" placeholder="Masuk E-mel" required>
                                                     </div>
                                            </div>

                                        </div>


                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Kata Laluan</label>
                                                  <input type="password" id="txtPassword" class="form-control"  name="val-password" value="" placeholder="Sekiranya menukar kata laluan">
                                                   <input type="hidden" name="old_pass" value="<?php echo $password; ?>">
                                                    </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Sahkan Kata Laluan </label>
                                                     <input type="password" id="txtConfirmPassword" class="form-control" name="val-confirm-password" placeholder="..sahkan kata laluan!">
                                                     </div>
                                            </div>

                                        </div>








                                    </div>
                                    <div class="form-actions">

                                    <button type="submit" class="btn btn-success" name="update" id="btnSubmit"> <i class="fa fa-check" ></i>Kemas Kini</button>
                                        <a href="users.php"><button type="button" class="btn btn-inverse">Batal</button></a>
                                    </div>
                                </form>
                            </div>
                        </div>

 </div>
</div>
</div>

        <div class="popup popup--icon -error js_error-popup" id="show_error">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Ralat
    </h1>
    <p>Kata Laluan dan Sahkan Kata Laluan tidak sepadan</p>
    <p>

     <button class="button button--error" data-for="js_error-popup">Tutup</button>

    </p>
  </div>
</div>


<?php include"footer.php"?>





     <script type="text/javascript">
    $(function () {
        $("#btnSubmit").click(function () {
            var password = $("#txtPassword").val();
            var confirmPassword = $("#txtConfirmPassword").val();
            if (password != confirmPassword) {

                 $('#show_error').addClass('popup--visible');
                return false;
            }
            else{
            return true;
        }
        });
    });




    var addButtonTrigger = function addButtonTrigger(el) {
el.addEventListener('click', function () {
var popupEl = document.querySelector('.' + el.dataset.for);
popupEl.classList.toggle('popup--visible');
});
};

Array.from(document.querySelectorAll('button[data-for]')).
forEach(addButtonTrigger);
</script>
