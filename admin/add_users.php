<?php
require_once('check_login.php');
?>
<?php include"header.php"?>

<?php include"sidebar.php"?>

        <div class="page-wrapper">

            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Pengguna</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Pengguna</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>


            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-primary">

                            <div class="card-body">
                              <form action="operations/user.php" method="post" id="loginForm" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <h3 class="card-title m-t-15">Maklumat Pengguna</h3>
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Nama</label>
                                             <input type="text"  class="form-control" name="val-username" pattern= "[a-zA-Z][a-zA-Z ]+"  placeholder="Masuk Nama" required>
                                                    </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">E-mel</label>
                                                    <input type="email"  class="form-control" name="val-email" placeholder="Masuk E-mel" required>
                                                     </div>
                                            </div>

                                        </div>


                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Kata Laluan</label>
                                                    <input type="password" id="txtPassword"   class="form-control"  name="val-password"  placeholder="Masuk Kata Laluan" required>
                                                    </div>

                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Sahkan Kata Laluan </label>
                                                    <input type="password" id="txtConfirmPassword"  class="form-control" name="val-confirm-password" placeholder="...dan mengesahkan!" required>
                                                     </div>
                                            </div>

                                        </div>



                                    </div>
                                    <div class="form-actions">

                                 <button type="submit" class="btn btn-success" name="submit" id="btnSubmit"> <i class="fa fa-check"></i> Simpan</button>
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

//pattern="(?=^.{8,}$)(?=.*\d)(?=.*[!@#$%^&*]+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"
//title="Sila Masukkan Sekurang-kurangnya satu abjad, satu abjad dalam huruf besar, Watak Khas, Digit untuk Kata Laluan Kuat"




    var addButtonTrigger = function addButtonTrigger(el) {
el.addEventListener('click', function () {
var popupEl = document.querySelector('.' + el.dataset.for);
popupEl.classList.toggle('popup--visible');
});
};

Array.from(document.querySelectorAll('button[data-for]')).
forEach(addButtonTrigger);
</script>
