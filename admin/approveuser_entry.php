<?php
require_once('check_login.php');
?>
<?php include"header.php"?>

<?php include"sidebar.php"?>

<?php
    if(isset($_GET['id']))
{ ?>
<div class="popup popup--icon -question js_question-popup popup--visible">
<div class="popup__background"></div>
<div class="popup__content">
<h3 class="popup__content__title">
Sure
</h1>
<p>Adakah Anda Pasti Akan Memadam Rekod Ini?</p>
<p>
<a href="operations/approve_delete.php?id=<?php echo $_GET['id']; ?>" class="button button--success" data-for="js_success-popup">Ya</a>
<a href="approveuser_entry.php" class="button button--error" data-for="js_success-popup">Tidak</a>
</p>
</div>
</div>
<?php } ?>

        <div class="page-wrapper">

            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Maklumat Pengguna Diaktifkan</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Pengguna Diaktifkan</a></li>
                        <li class="breadcrumb-item active">Papan Pemuka</li>
                    </ol>
                </div>
            </div>


            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">



                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Nama</th>
                                                <th>E-mel</th>

                                                 <th>Tindakan</th>

                                            </tr>
                                        </thead>

                                        <tbody>

<?php
include"config.php";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM users where status='Activate'");
    $stmt->execute();


    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $data=$stmt->fetchAll();

}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

                                                 foreach ($data as $value) { ?>
                                            <tr>
                                              <td><?php echo $value['id'];?></td>
                                                <td><?php echo $value['name'];?></td>
                                                  <td><?php echo $value['email'];?></td>


        <td>
          <a href="disapprove_user.php?id=<?php echo $value['id']; ?>" class="btn btn-xs btn-info"><i class="fa fa-thumbs-down fa-2x" aria-hidden="true" ></i></a>


</td>

                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>


<?php include"footer.php"?>

   <?php if(!empty($_SESSION['success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
    Diaktifkan
    </h1>
    <p><?php echo $_SESSION['success']; ?></p>
    <p>
      <?php echo "<script>
  setTimeout(\"location.href='approveuser_entry.php'\", 2000);

</script>"?>
    </p>
  </div>
</div>
<?php unset($_SESSION["success"]);
} ?>

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
