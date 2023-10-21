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
Sure
</h1>
<p>Are You Sure To Delete This Record?</p>
<p>
<a href="operations/booking.php?id=<?php echo $_GET['id']; ?>" class="button button--success" data-for="js_success-popup">Yes</a>
<a href="booking_details.php" class="button button--error" data-for="js_success-popup">No</a>
</p>
</div>
</div>
<?php } ?>

        <div class="page-wrapper">

            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Menjana Surat Pelantikan</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Menjana Surat Pelantikan</a></li>
                        <li class="breadcrumb-item active">Papan Pemuka</li>
                    </ol>
                </div>
            </div>


            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="card">




                               <a href="letter1.php"><button type="button" class="btn btn-primary">Guru Besar</button></a>
                             </div>
                                 <div class="card">
                               <a href="letter2.php"><button type="button" class="btn btn-primary">Pengetua</button></a>
                             </div>
                               <div class="card">
                               <a href="letter3.php"><button type="button" class="btn btn-primary">Pengawai Pendidikan Daerah</button></a>

                            </div>
                        </div>


                    </div>
                </div>

            </div>

        <?php



?>
 <?php include"footer.php";
?>


<?php if(!empty($_SESSION['success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success
    </h1>
    <p><?php echo $_SESSION['success']; ?></p>
    <p>
 <?php echo "<script>
  setTimeout(\"location.href='booking_details.php'\", 2000);

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
      Error
    </h1>
    <p><?php echo $_SESSION['error']; ?></p>
    <p>
     <?php echo "<script>
  setTimeout(\"location.href='booking_details.php'\", 2000);

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
