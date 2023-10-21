<?php
require_once('check_login.php');
?>
<?php include"header.php"?>


 <?php
    if(isset($_GET['id']))
{ ?>
<div class="popup popup--icon -question js_question-popup popup--visible">
<div class="popup__background"></div>
<div class="popup__content">
<h3 class="popup__content__title">

</h3>

<p>
<a href="operations/candidate3.php?id=<?php echo $_GET['id']; ?>" class="button button--success" data-for="js_success-popup">Ya</a>
<a href="candidates3.php" class="button button--error" data-for="js_success-popup">Tidak</a>
</p>
</div>
</div>
<?php } ?>
<?php
include"config.php";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $stmt = $conn->prepare("SELECT ppd FROM candidate1 where no='1' and flow= '".$_GET['flow']."'");

    $stmt->execute();


    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);


    $data=$stmt->fetchAll();






}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}


                                                 foreach ($data as $value) { ?>

                                                   <?php
                                                   include"config.php";

                                                   try {
                                                       $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                                       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




                                                       $stmt1 = $conn->prepare("SELECT * FROM ppsm where id='0'");
                                                         $stmt1->execute();
                                                           $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC);
                                                           $data1=$stmt1->fetchAll();




                                                   }
                                                   catch(PDOException $e) {
                                                       echo "Error: " . $e->getMessage();
                                                   }

                                                      foreach ($data1 as $value1) { ?>

        <div class="page-wrapper">

            <div class="row page-titles">


                <div class="col-md-7 align-self-center">

                </div>
            </div>


            <div class="container-fluid">


                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">
                              <h3 class="text-primary" style="font-size: 20px; text-transform: uppercase;"> <b> PPSM PPP <?php echo $value1['noppsm'];?>/2022 <br> CADANGAN PELANTIKAN, PERGERAKAN DAN PENEMPATAN <br> SEMULA
                              BARISAN HADAPAN JABATAN PENDIDIKAN NEGERI SEMBILAN
                          </b> <img src="../admin/settings/logo1.png" style="position: absolute; right:30px; top:15px;" width="180PX" height="130PX"></h3>

                             <?php }?>  <?php }?>







                                <div class="table-responsive m-t-40">
                                    <table style="text-align: left; font-size:15px;" id="example233" enctype="multipart/form-data" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <!--td style='width:10px;'><b>ID</b></td-->
                                                <td style='width:10px;'><b>Aliran</b></td>
                                                <td style='max-width: 25px;'><b>Gambar</b></td>

                                                <td style='max-width:50px;'><b>Pegawai</b></td>

                                                  <td style='max-width:50px;'><b>Catatan</b></td>







                                            </tr>
                                        </thead>

                                        <tbody>

<?php
include"config.php";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $stmt = $conn->prepare("SELECT * FROM candidate3 where flow= '".$_GET['flow']."'");
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $data=$stmt->fetchAll();


}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}


                                                 foreach ($data as $value) { ?>
                                                   <?php $newdate = date("d-m-Y", strtotime($value['retiredate']));
                                                  $newdate1 = date("d-m-Y", strtotime($value['currentdate1']));
                                                  $newdate2 = date("d-m-Y", strtotime($value['currentdate2']));
                                                  $newdate3 = date("d-m-Y", strtotime($value['startdate1']));
                                                  $newdate4 = date("d-m-Y", strtotime($value['startdate2']));
                                                  $newdate5 = date("d-m-Y", strtotime($value['startdate3']));
                                                  $newdate6 = date("d-m-Y", strtotime($value['enddate1']));
                                                  $newdate7 = date("d-m-Y", strtotime($value['enddate2']));
                                                  $newdate8 = date("d-m-Y", strtotime($value['enddate3']));
                                                   ?>
                            <tr>


                                <td style="width:10px"><?php echo $value['flow'];?></td>
                                <td style='max-width:25px; text-align: left;'>   <img src="../admin/upload/<?php echo $value['image'];?>"width="140" height="140"></td>

                                     <td style="max-width: 50px;">
                                       <b> UNIT:</b>    <?php echo $value['unit'];?> <br>
                                    <b>NAMA:</b> <?php echo $value['name'];?> <br>
                                    <b>NO. KP:</b> <?php echo $value['icno'];?> <br>

                                    <b>JAWATAN SEMASA:</b> <?php echo $value['others'];?><br>
                                    <b>GRED PENYANDANG:</b> <?php echo $value['gred'];?><br>
                                    <b>GRED HAKIKI:</b> <?php echo $value['actgred'];?><br>
                                    <b>TEMPAT BERTUGAS:</b> <?php echo $value['workplace'];?><br>
                                    <b>TARIKH BERSARA:</b> <?php echo date("d-m-Y", strtotime($value['retiredate']));?><br>
                                    <b>ALAMAT RUMAH:</b> <?php echo $value['address'];?><br>

                                    <b>TARIKH IDMAT PEJABAT SEMASA:</b> <?php echo date("d-m-Y", strtotime($value['currentdate1']));?><br>
                                    <b>TARIKH LANTIKAN JAWATAN SEMASA:</b> <?php echo date("d-m-Y", strtotime($value['currentdate2']));?><br>

                                     <b>JARAK KEDIAMAN PEJABAT ASAL:</b>    <?php echo $value['distancecurrent'];?> KM<br>



                                    </td>
                                    <td style='max-width: 50px; text-align: left;'>
                                      <b>JARAK KEDIAMAN PEJABAT BARU:</b>    <?php echo $value['distancenew'];?> KM<br>
                                          <b>PERBEZAAN JARAK:</b>    <?php echo $value['total'];?> KM<br>
                                          <u><b>PENGALAMAN KERJA</b></u><br>
                                          <b>JAWATAN DAN TEMPAT BERTUGAS: </b><br>1. <?php echo $value['positionhist'];?>, <?php echo $value['placehist'];?> (<?php echo date("d-m-Y", strtotime($value['startdate1']));?> -> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          <?php  //echo date("d-m-Y", strtotime($value['enddate1']));?>)<br>
                                          2. <?php echo $value['positionhist2'];?>, <?php echo $value['placehist2'];?> (<?php echo date("d-m-Y", strtotime($value['startdate2']));?> -> <?php echo date("d-m-Y", strtotime($value['enddate2']));?>)<br>3. <?php echo $value['positionhist3'];?>,
                                          <?php echo $value['placehist3'];?> (<?php echo date("d-m-Y", strtotime($value['startdate3']));?> -> <?php echo date("d-m-Y", strtotime($value['enddate3']));?>)<br>
                                          <!--b>TEMPAT BERTUGAS: </b><br>1. <?php //echo $value['placehist'];?><br>
                                          2. <?php //echo $value['placehist2'];?><br>3. <?php //echo $value['placehist3'];?><br-->


                                          <b>JUSTIFIKASI:</b> <?php echo $value['justification'];?> <br>
                                            <b>CATATAN:</b> <?php echo $value['notes'];?> <br>

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
  setTimeout(\"location.href='candidates3.php'\", 2000);

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
  setTimeout(\"location.href='candidates3.php'\", 2000);

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
