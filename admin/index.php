<?php
require_once('check_login.php');
?>
<?php include"header.php"?>

<?php include"sidebar.php"?>
<?php include"config.php"?>
<?php
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>

        <div class="page-wrapper">

            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Papan Pemuka</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Laman Utama</a></li>
                        <li class="breadcrumb-item active">Papan Pemuka</li>
                    </ol>
                </div>
            </div>


            <div class="container-fluid">
                  <marquee scrollamount=4><b>Hak Unit Pengurusan Bakat, JPNNS</b></marquee>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card p-30"  style="background: #FF5370;">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-users f-s-40 color-white"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <?php
                                    $stmt = $conn->prepare("SELECT Count(*) as cnt FROM candidate");
                                    $stmt->execute();
                                    $result = $stmt->fetch(PDO::FETCH_ASSOC);

                                     ?>
                                   <h2 style="color:white"><?php echo $result['cnt']; ?></h2>
                                    <p class="m-b-0" style="color:white">Jumlah Cadangan Pegawai Unit Rendah</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card p-30"  style="background: purple;">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-users f-s-40 color-white"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <?php
                                    $stmt = $conn->prepare("SELECT Count(*) as cnt FROM candidate1");
                                    $stmt->execute();
                                    $result = $stmt->fetch(PDO::FETCH_ASSOC);

                                     ?>
                                   <h2 style="color:white"><?php echo $result['cnt']; ?></h2>
                                    <p class="m-b-0" style="color:white">Jumlah Cadangan Pegawai Unit Menengah</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card p-30"  style="background: grey;">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-users f-s-40 color-white"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <?php
                                    $stmt = $conn->prepare("SELECT Count(*) as cnt FROM candidate2");
                                    $stmt->execute();
                                    $result = $stmt->fetch(PDO::FETCH_ASSOC);

                                     ?>
                                   <h2 style="color:white"><?php echo $result['cnt']; ?></h2>
                                    <p class="m-b-0" style="color:white">Jumlah Cadangan Pegawai <br> PPD</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card p-30"  style="background: RED;">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-users f-s-40 color-white"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <?php
                                    $stmt = $conn->prepare("SELECT Count(*) as cnt FROM candidate3");
                                    $stmt->execute();
                                    $result = $stmt->fetch(PDO::FETCH_ASSOC);

                                     ?>
                                   <h2 style="color:white"><?php echo $result['cnt']; ?></h2>
                                    <p class="m-b-0" style="color:white">Jumlah Cadangan Pegawai <br> JPNNS</p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="card p-30" style="background: orange;">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 color-white"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <?php
                                    $stmt = $conn->prepare("SELECT Count(*) as cnt FROM candidate where status='Diperaku'");
                                    $stmt->execute();
                                    $result = $stmt->fetch(PDO::FETCH_ASSOC);

                                     ?>
                                    <h2 style="color:white"><?php echo $result['cnt']; ?></h2>
                                    <p class="m-b-0" style="color:white">Jumlah Pegawai Yang Diperaku Unit Rendah</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card p-30" style="background: blue;">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 color-white"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <?php
                                    $stmt = $conn->prepare("SELECT Count(*) as cnt FROM candidate1 where status='Diperaku'");
                                    $stmt->execute();
                                    $result = $stmt->fetch(PDO::FETCH_ASSOC);

                                     ?>
                                    <h2 style="color:white"><?php echo $result['cnt']; ?></h2>
                                    <p class="m-b-0" style="color:white">Jumlah Pegawai Yang Diperaku Unit Menengah</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card p-30" style="background: #00807A;">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 color-white"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <?php
                                    $stmt = $conn->prepare("SELECT Count(*) as cnt FROM candidate2 where status='Diperaku'");
                                    $stmt->execute();
                                    $result = $stmt->fetch(PDO::FETCH_ASSOC);

                                     ?>
                                    <h2 style="color:white"><?php echo $result['cnt']; ?></h2>
                                    <p class="m-b-0" style="color:white">Jumlah Pegawai Yang Diperaku <br> PPD</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card p-30" style="background: #2C1112;">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 color-white"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <?php
                                    $stmt = $conn->prepare("SELECT Count(*) as cnt FROM candidate3 where status='Diperaku'");
                                    $stmt->execute();
                                    $result = $stmt->fetch(PDO::FETCH_ASSOC);

                                     ?>
                                    <h2 style="color:white"><?php echo $result['cnt']; ?></h2>
                                    <p class="m-b-0" style="color:white">Jumlah Pegawai Yang Diperaku JPNNS</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card p-30" style="background: #28a745;">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-calendar f-s-40 color-white"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <?php
                                    $stmt = $conn->prepare("SELECT * FROM datepbsm where id='0'");
                                    $stmt->execute();
                                    $result = $stmt->fetch(PDO::FETCH_ASSOC);

                                     ?>
                                    <h2 style="color:white"><?php echo $result['date']; ?></h2>
                                    <p class="m-b-0" style="color:white">Tarikh Watikah</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card p-30" style="background: #FFEF00;">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-sticky-note f-s-40 color-white"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <?php
                                    $stmt = $conn->prepare("SELECT * FROM ppsm where id='0'");
                                    $stmt->execute();
                                    $result = $stmt->fetch(PDO::FETCH_ASSOC);

                                     ?>
                                    <h2 style="color:white">PPSM PPP Ke- <?php echo $result['noppsm']; ?></h2>
                                    <p class="m-b-0" style="color:white">PPSM PPP 2022</p>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>



            </div>








<?php include"footer.php"?>
