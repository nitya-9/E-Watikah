<?php
require_once('check_login.php');
?>
<?php include"header.php"?>

<?php include"sidebar.php";?>
<?php
//db connection
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'tour1');
?>

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
<a href="operations/candidate.php?id=<?php echo $_GET['id']; ?>" class="button button--success" data-for="js_success-popup">Ya</a>
<a href="status.php" class="button button--error" data-for="js_success-popup">Tidak</a>
</p>
</div>
</div>
<?php } ?>

        <div class="page-wrapper">

            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Senarai Cadangan Pegawai Unit Rendah</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Senarai Cadangan Pegawai Unit Rendah</a></li>
                        <li class="breadcrumb-item active">Papan Pemuka</li>
                    </ol>
                </div>
            </div>


            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                              <form method='get' action='print.php'>
                                <select name='flow'>
                                  <?php
                                    //show invoices list as options
                                    $query = mysqli_query($con,"select flow from candidate group by flow");
                                    while($candidate = mysqli_fetch_array($query)){
                                      echo "<option value='".$candidate['flow']."'>".$candidate['flow']."</option>";
                                    }
                                  ?>
                                </select>
                                <input type='submit' value='Cetak' class="btn btn-primary">
                              </form>

                              <!--a href="print.php"><button type="button" class="btn btn-primary">Cetak</button></a--->




                                <div class="table-responsive m-t-40">
                                    <table style="text-align: left;" id="example235" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <td style='width:10px;'><b>Aliran</b></td>
                                                <td style='width:10px;'><b>ID</b></td>

                                                <td style='max-width:60%;'><b>Pegawai</b></td>
                                                <td style='max-width:50%;'><b> Pilih Status</b></td>

                                                <td style='max-width:15%;'><b>Status</b></td>





                                            </tr>
                                        </thead>

                                        <tbody>

<?php
include"config.php";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $stmt = $conn->prepare("SELECT * FROM candidate order by flow,no");
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $data=$stmt->fetchAll();

    if(isset($_GET['id']))
      {
        $id=$_GET['id'];
          $stmt1 = $conn->prepare("SELECT * FROM candidate order by flow, no where id='".$_GET['id']."'");
       $stmt1->execute();
        $row=$stmt1->fetch(PDO::FETCH_ASSOC);
        $status=$row['status'];
             $data1=$stmt1->fetchAll();
            }

}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}


                                                 foreach ($data as $value) { ?>
                            <tr>

                                <td style="width:10px"><?php echo $value['flow'];?></td>
                                <td style="width:10px"><?php echo $value['no'];?></td>
                                     <td style='max-width:60%;'>
                                       Unit:    <?php echo $value['unit'];?> <br>
                                    Nama: <?php echo $value['name'];?> <br>
                                    No. KP:<?php echo $value['icno'];?> <br>
                                    Jawatan Semasa: <?php echo $value['position'];?> <br>
                                    Jawatan Semasa Lain-lain: <?php echo $value['others'];?><br>
                                    Tempat Bertugas: <?php echo $value['workplace'];?><br>
                                    Gred Penyandang: <?php echo $value['gred'];?><br>
                                    Gred Hakiki:<?php echo $value['actgred'];?><br>
                                    </td>

                       <td style='max-width:50%; text-align: left;'>



                         <form action="operations/statuscan.php?edit_id=<?php echo $value ['id'];?>" method="post" enctype="multipart/form-data">
                        <label class="control-label"></label>
                        <select name="status" id ="status"  class="form-control custom-select" data-toggle="dropdown" required>
                     <option value=""> Pilih Status</option>
                <option value="Diperaku" >Diperaku</option>
                <option value="Tidak Diperaku" >Tidak Diperaku</option>
                <option value="Simpan" >Simpan</option>
                <option value="Tunggu" >Tunggu</option>
              </select>
              <!--script>

       function getSelectValue()
       {
           var selectedValue = document.getElementById("status").value;
           console.log(selectedValue);
       }
       getSelectValue();

   </script-->

   <div class="form-actions">

<br>
       <button type="submit" class="btn btn-success" name="update" id="btnValidate"> <i class="fa fa-check" ></i>Simpan</button>
       <a href="status.php"><button type="button" class="btn btn-inverse">Batal</button></a>
   </div>
</form>







                   </td>
                   <td style="max-width:15%; color: blue; text-align: center; font-size: 20px"><br><br><br><b><?php echo $value['status'];?><b></td>


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
  setTimeout(\"location.href='status.php'\", 2000);

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
  setTimeout(\"location.href='status.php'\", 2000);

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
