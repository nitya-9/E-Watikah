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
<a href="operations/candidate2.php?id=<?php echo $_GET['id']; ?>" class="button button--success" data-for="js_success-popup">Ya</a>
<a href="candidates2.php" class="button button--error" data-for="js_success-popup">Tidak</a>
</p>
</div>
</div>
<?php } ?>

        <div class="page-wrapper">

            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Senarai Cadangan Pegawai PPD</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Senarai Cadangan Pegawai PPD</a></li>
                        <li class="breadcrumb-item active">Papan Pemuka</li>
                    </ol>
                </div>
            </div>


            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">



                              <a href="add_candidates2.php"><button type="button" class="btn btn-primary">Tambah Cadangan Pegawai</button></a>
                              <div class="all-scroll">

                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>

                                                <!--th>Id</th-->
                                                <th>Aliran</th>
                                                <th>Unit</th>
                                                <th>Nama</th>
                                                <th>No. K/P</th>
                                                <th>Jawatan Semasa</th>

                                                <th>Tempat Bertugas</th>
                                                <th>Gred Hakiki</th>
                                                <th>Gred Penyandang</th>
                                                <th>Tarikh Bersara</th>
                                                <th>Alamat Rumah.....</th>
                                                <th>Tarikh Khidmat Pejabat Semasa</th>
                                                <th>Tarikh Lantikan Jawatan Semasa</th>
                                                <!--th>Pergerakan</th-->
                                                <th>Jarak Kediaman Pejabat Asal(KM)</th>
                                                <th>Jarak Kediaman Pejabat Baru(KM)</th>
                                                <th>Perbezaan Jarak(KM)</th>
                                                <th>Pengalaman Kerja (Jawatan)</th>
                                                <th>Pengalaman Kerja (Tempat Bertugas)...........</th>
                                                <th>Tarikh Mula..........</th>
                                                <th>Tarikh Akhir.........</th>
                                                <th>Justifikasi.....</th>
                                                <th>Catatan.....................</th>
                                                <!--th>Pegawai Sebelum</th-->
                                                <th>Jawatan Baru</th>
                                                <!--th>Jawatan Lain-lain</th-->
                                                <th>Tindakan</th>


                                            </tr>
                                        </thead>

                                        <tbody>

<?php
include"config.php";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $stmt = $conn->prepare("SELECT * FROM candidate2 order by flow,id");
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
                                      <td style="width:10px"><?php echo $value['unit'];?></td>
                                      <td style="width:20px"><?php echo $value['name'];?></td>
                                      <td style="width:10px"><?php echo $value['icno'];?></td>
                                      <!--td style="width:40px"><?php echo $value['position'];?></td-->
                                      <td style="width:10px"><?php echo $value['others'];?></td>
                                      <td style="width:10px"><?php echo $value['workplace'];?></td>
                                      <td style="width:10px"><?php echo $value['actgred'];?></td>
                                      <td style="width:20px"><?php echo $value['gred'];?></td>
                                      <td style="width:20px"><?php echo date("d-m-Y", strtotime($value['retiredate']));?></td>
                                      <td style="width:20px"><?php echo $value['address'];?></td>
                                      <td style="width:20px"><?php echo date("d-m-Y", strtotime($value['currentdate1']));?></td>
                                      <td style="width:20px"><?php echo date("d-m-Y", strtotime($value['currentdate2']));?></td>
                                      <!--td style="width:20px"><?php echo $value['modeofchange'];?></td-->
                                      <td style="width:20px"><?php echo $value['distancecurrent'];?></td>
                                      <td style="width:20px"><?php echo $value['distancenew'];?></td>
                                      <td style="width:20px"><?php echo $value['total'];?></td>
                                      <td style="width:30px">1.<?php echo $value['positionhist'];?> <br>
                                        2.<?php echo $value['positionhist2'];?><br>
                                        3.<?php echo $value['positionhist3'];?>
                                      </td>
                                      <td style="width:30px">1.<?php echo $value['placehist'];?> <br>
                                        2.<?php echo $value['placehist2'];?><br>
                                        3.<?php echo $value['placehist3'];?>
                                      </td>
                                      <td style="width:30px">1.<?php echo date("d-m-Y", strtotime($value['startdate1']));?> <br>
                                        2.<?php echo date("d-m-Y", strtotime($value['startdate2']));?><br>
                                        3.<?php echo date("d-m-Y", strtotime($value['startdate3']));?>
                                      </td>
                                      <td style="width:30px">1.<?php echo "00-00-0000";?> <br>
                                        2.<?php echo date("d-m-Y", strtotime($value['enddate2']));?><br>
                                        3.<?php echo date("d-m-Y", strtotime($value['enddate3']));?>
                                      </td>
                                      <td style="width:20px"><?php echo $value['justification'];?></td>
                                      <td style="width:40px"><?php echo $value['notes'];?></td>
                                       <!--td style="width:40px"><?php echo $value['takefrom'];?></td-->
                           <!--td style="width:40px"><?php echo $value['positionof'];?></td-->
                           <td style="width:50px"><?php echo $value['othersnewpost'];?></td>

                       <td style="width: 20px"><a href="candidates2.php?id=<?php echo $value['id']; ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" title="Padam"></i></a>

                       <a href="update_candidates2.php?id=<?php echo $value['id']; ?>" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" title="Kemas Kini"></i></a>



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
  setTimeout(\"location.href='candidates2.php'\", 2000);

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
  setTimeout(\"location.href='candidates2.php'\", 2000);

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
