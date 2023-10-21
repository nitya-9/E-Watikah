<?php
require_once('check_login.php');
?>
<?php include"header.php"?>

<?php include"sidebar.php";?>

 <?php
    if(isset($_GET['id']))
{ ?>
<div class="popup popup--icon -question js_question-popup popup--visible">
<div class="popup__background"></div>
<div class="popup__content">
<h3 class="popup__content__title">

</h3>
<p>Adakah Anda Pasti Akan Memadam Rekod Ini?</p>
<p>
<a href="operations/candidate4.php?id=<?php echo $_GET['id']; ?>" class="button button--success" data-for="js_success-popup">Ya</a>
<a href="candidates4.php" class="button button--error" data-for="js_success-popup">Tidak</a>
</p>
</div>
</div>
<?php } ?>

        <div class="page-wrapper">

            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Pegawai Diperaku Lain-lain</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Pegawai Diperaku Lain-lain</a></li>
                        <li class="breadcrumb-item active">Papan Pemuka</li>
                    </ol>
                </div>
            </div>


            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                              <div class="all-scroll">




                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>



                                                <th>FLOW UNIT</th>
                                                <th>NAMA</th>
                                                <th>JAWATAN LAMA</th>
                                                <th>JAWATAN LAMA LAIN-LAIN</th>
                                                <th>PENEMPATAN LAMA</th>
                                                <th>No. K/P</th>
                                                <th>GRED PENYANDANG</th>
                                                <th>JAWATAN BARU</th>
                                                  <th>JAWATAN BARU LAIN-LAIN</th>
                                                  <th>PENEMPATAN BARU</th>
                                                 <th>GRED HAKIKI</th>
                                                 <th>TARIKH KUATKUASA</th>
                                                 <th>TINDAKAN</th>





                                            </tr>
                                        </thead>

                                        <tbody>

<?php
include"config.php";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $stmt = $conn->prepare("SELECT * FROM candidate4 WHERE status='Diperaku' order by flow,no");
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $data=$stmt->fetchAll();

}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

                                                 foreach ($data as $value) { ?>
                            <tr>



                                      <td style="width:10px"><?php echo $value['unit'];?></td>
                                      <td style="width:20px"><?php echo $value['name'];?></td>
                                      <td style="width:40px"><?php echo $value['position'];?></td>
                                      <td style="width:10px"><?php echo $value['others'];?></td>
                                      <td style="width:10px"><?php echo $value['workplace'];?></td>
                                      <td style="width:10px"><?php echo $value['icno'];?></td>
                                      <td style="width:10px"><?php echo $value['gred'];?></td>
                                      <td style="width:40px"><?php echo $value['positionof'];?></td>
                                      <td style="width:40px"><?php echo $value['othersnewpost'];?></td>

                                      <td style="width:20px"><?php echo $value['newplace'];?></td>
                                      <td style="width:20px"><?php echo $value['actgred'];?></td>
                                      <td style='width: 40px; text-align:left;'><?php echo $value['startdate'];?></td>
                                      <td style="width:20px">

                                       <a href="update_candidates4.php?id=<?php echo $value['id']; ?>" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" title="Kemas Kini"></i></a>
                                        <a href="lettergen7.php?id=<?php echo $value['id']; ?>" class="btn btn-xs btn-success"><i class="fa fa-file-pdf-o" data-toggle="tooltip" title="Menjana Surat"></i></a>




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


 <?php include"footer.php";
?>


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
  setTimeout(\"location.href='candidates4.php'\", 2000);

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
  setTimeout(\"location.href='candidates4.php'\", 2000);

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
