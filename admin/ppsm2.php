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
        $stmt1 = $conn->prepare("SELECT * FROM ppsm where id='0' ");
     $stmt1->execute();
      $row=$stmt1->fetch(PDO::FETCH_ASSOC);
              $id=$row['id'];
            $noppsm=$row['noppsm'];




     $data1=$stmt1->fetchAll();
    }


    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
     $_SESSION['reply'] = "Berjaya";
  header("location:../ppsm1.php");
    }

$conn = null;
?>

        <div class="page-wrapper">

            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">PPSM</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">PPSM</a></li>
                        <li class="breadcrumb-item active">Papan Pemuka</li>
                    </ol>
                </div>
            </div>


            <div class="container-fluid">
                  <div class="row">
                    <div class="col-lg-12">

                  <div class="card card-outline-primary">
                       <div class="card-body">
                            <form action="operations/ppsm.php?edit_id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
                              <div class="form-body">
                                  <h3 class="card-title m-t-15">PPSM</h3>
                                  <hr>
                                  <div class="row p-t-20">


                                     <div class="col-md-6">
                                          <div class="form-group has-danger">
                                              <label class="control-label">Masukkan No. PPSM</label>
                                            <input type="text"  class="form-control" id="noppsm" value="<?php echo $noppsm;?>" name="noppsm" placeholder="" >
                                      </div>
                                  </div>




                              </div>
                                    <div class="form-actions">

                                      <button type="submit" class="btn btn-success" name="update"> <i class="fa fa-check" ></i> Kemas Kini</button>
                                        <a href="ppsm1.php"><button type="button" class="btn btn-inverse">Batal</button></a>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
                </div>

            </div>


<?php include"footer.php"?>
<script type="text/javascript">
var addButtonTrigger = function addButtonTrigger(el) {
el.addEventListener('click', function () {
var popupEl = document.querySelector('.' + el.dataset.for);
popupEl.classList.toggle('popup--visible');
});
};

Array.from(document.querySelectorAll('button[data-for]')).
forEach(addButtonTrigger);
</script>
