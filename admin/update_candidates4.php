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
        $stmt1 = $conn->prepare("SELECT * FROM candidate4 where id='".$_GET['id']."'");
     $stmt1->execute();
      $row=$stmt1->fetch(PDO::FETCH_ASSOC);

       $id=$row['id'];
       $no=$row['no'];
       $flow=$row['flow'];
       $unit=$row['unit'];
       $name=$row['name'];
       $icno=$row['icno'];
        $position=$row['position'];
        $others=$row['others'];
        $actgred=$row['actgred'];
         $gred=$row['gred'];
           $workplace=$row['workplace'];
            $retiredate=$row['retiredate'];
             $address=$row['address'];
             $currentdate1=$row['currentdate1'];
           $currentdate2=$row['currentdate2'];
            $modeofchange=$row['modeofchange'];
              $newplace=$row['newplace'];
            $distancecurrent=$row['distancecurrent'];
            $distancenew=$row['distancenew'];
              $total=$row['total'];
            $justification=$row['justification'];
              $notes=$row['notes'];
            //$takefrom=$row['takefrom'];
            $positionof=$row['positionof'];
            $othersnewpost=$row['othersnewpost'];
            $image=$row['image'];

            $ref1=$row['ref1'];
            $letterdate1=$row['letterdate1'];
            $postcode=$row['postcode'];
            //$dg1=$row['dg1'];
            //$dg2=$row['dg2'];
            //$ref2=$row['ref2'];
            //$letterdate2=$row['letterdate2'];
              $startdate=$row['startdate'];





     $data1=$stmt1->fetchAll();
    }


    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
     $_SESSION['reply'] = "Added Successfully";
  header("location:../candidates4.php");
    }

$conn = null;
?>

        <div class="page-wrapper">

            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Kemas Kini Maklumat Pegawai Lain-lain</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Kemas Kini Maklumat Pegawai Lain-lain</a></li>
                        <li class="breadcrumb-item active">Papan Pemuka</li>
                    </ol>
                </div>
            </div>


            <div class="container-fluid">
                  <div class="row">
                    <div class="col-lg-12">

                  <div class="card card-outline-primary">
                       <div class="card-body">
                            <form action="operations/candidate4.php?edit_id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
                              <div class="form-body">
                                  <h3 class="card-title m-t-15">Maklumat Pegawai</h3>
                                  <hr>
                                  <div class="row p-t-20">


                                  <div class="col-md-6">
                                        <div class="form-group has-danger">
                                            <label class="control-label">Aliran</label>
                                             <input type="text" class="form-control" id="flow" value="<?php echo $flow;?>" name="flow" placeholder="Masuk Aliran" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                      <div class="form-group has-danger">
                                          <label class="control-label">ID</label>
                                           <input type="text" class="form-control" id="no" value="<?php echo $no;?>" name="no" placeholder="Masuk ID" required>
                                  </div>
                              </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label class="control-label">Unit</label>
                                          <input type="text" class="form-control" id="unit" value="<?php echo $unit;?>" name="unit" placeholder="Masuk Unit" required>

                                          </div>
                                  </div>





                                  <div class="col-md-6">
                                        <div class="form-group has-danger">
                                            <label class="control-label">Nama</label>
                                             <input type="text" class="form-control" id="name" value="<?php echo $name;?>" name="name" placeholder="Masuk Nama" required>
                                    </div>
                                </div>

                                  <div class="col-md-6">
                                        <div class="form-group has-danger">
                                            <label class="control-label">No. I/C</label>
                                             <input type="text" class="form-control" id="icno" value="<?php echo $icno;?>" name="icno" placeholder="Masuk No. I/C" required>
                                    </div>
                                </div>












                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label class="control-label">Jawatan Semasa</label>
                                              <select name="position" class="form-control custom-select" data-toggle="dropdown" required>
                                           <option value=""> Pilih Jawatan</option>
                                      <option value="Guru Besar" <?php if($row['position']=="Guru Besar"){echo "selected";}?>>Guru Besar</option>
                                      <option value="Pengetua" <?php if($row['position']=="Pengetua"){echo "selected";}?>>Pengetua</option>
                                      <option value="Guru Penolong Kanan Pentadbiran" <?php if($row['position']=="Guru Penolong Kanan Pentadbiran"){echo "selected";}?>>Guru Penolong Kanan Pentadbiran</option>
                                      <option value="Guru Penolong Kanan Hal Ehwal Murid" <?php if($row['position']=="Guru Penolong Kanan Hal Ehwal Murid"){echo "selected";}?>>Guru Penolong Kanan Hal Ehwal Murid</option>
                                      <option value="Guru Penolong Kanan Kokurikulum" <?php if($row['position']=="Guru Penolong Kanan Kokurikulum"){echo "selected";}?>>Guru Penolong Kanan Kokurikulum</option>
                                      <option value="Guru Penolong Kanan Tingkatan 6" <?php if($row['position']=="Guru Penolong Kanan Tingkatan 6"){echo "selected";}?>>Guru Penolong Kanan Tingkatan 6</option>
                                      <option value="Guru Penolong Kanan Pendidikan Khas" <?php if($row['position']=="Guru Penolong Kanan Pendidikan Khas"){echo "selected";}?>>Guru Penolong Kanan Pendidikan Khas</option>
                                      <option value="Penyelia Petang" <?php if($row['position']=="Penyelia Petang"){echo "selected";}?>>Penyelia Petang</option>
                                      <option value="Guru Kanan Matapelajaran Sains Dan Matematik" <?php if($row['position']=="Guru Kanan Matapelajaran Sains Dan Matematik"){echo "selected";}?>>Guru Kanan Matapelajaran Sains Dan Matematik</option>
                                      <option value="Guru Kanan Matapelajaran TVET" <?php if($row['position']=="Guru Kanan Matapelajaran TVET"){echo "selected";}?>>Guru Kanan Matapelajaran TVET</option>
                                      <option value="Guru Kanan Matapelajaran Bahasa" <?php if($row['position']=="Guru Kanan Matapelajaran Bahasa"){echo "selected";}?>>Guru Kanan Matapelajaran Bahasa</option>
                                      <option value="Guru Kanan Matapelajaran Kemanusian" <?php if($row['position']=="Guru Kanan Matapelajaran Kemanusian"){echo "selected";}?>>Guru Kanan Matapelajaran Kemanusian</option>
                                      <option value="Guru Akademik Biasa" <?php if($row['position']=="Guru Akademik Biasa"){echo "selected";}?>>Guru Akademik Biasa</option>
                                      <option value=""<?php if($row['position']==""){echo "selected";}?>>Lain-lain</option>

                                              </select>
                                              </div>
                                      </div>

                                      <div class="col-md-6">
                                            <div class="form-group has-danger">
                                                <label class="control-label">Jawatan Semasa Lain-lain</label>
                                                 <input type="text" class="form-control" id="others" value="<?php echo $others;?>" name="others" placeholder="Masuk Jawatan" >
                                        </div>
                                    </div>








                                  <div class="col-md-6">
                                        <div class="form-group has-danger">
                                            <label class="control-label">Gred Hakiki</label>
                                             <input type="text" class="form-control" id="actgred" value="<?php echo $actgred;?>" name="actgred" placeholder="Masuk Gred Hakiki" required>
                                    </div>
                                </div>

                                  <div class="col-md-6">
                                        <div class="form-group has-danger">
                                            <label class="control-label">Gred Penyandang</label>
                                             <input type="text" class="form-control" id="gred" value="<?php echo $gred;?>" name="gred" placeholder="Masuk Gred Penyandang" >
                                    </div>
                                </div>




                                  <div class="col-md-6">
                                        <div class="form-group has-danger">
                                            <label class="control-label">Tempat Bertugas</label>
                                             <input type="text" class="form-control" id="workplace" value="<?php echo $workplace;?>" name="workplace" placeholder="Masuk Tempat Bertugas" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="form-group has-danger">
                                         <label class="control-label">Poskod</label>
                                       <input type="text"  class="form-control" id="postcode" value="<?php echo $postcode;?>" name="postcode" placeholder="Masuk Poskod">
                                 </div>
                              </div>

                                     <div class="col-md-6">
                                          <div class="form-group has-danger">
                                              <label class="control-label">Tarikh Bersara</label>
                                            <input type="date"  class="form-control" id="retiredate" value="<?php echo $retiredate;?>" name="retiredate" placeholder="" >
                                      </div>
                                  </div>


                                  <div class="col-md-6">
                                        <div class="form-group has-danger">
                                            <label class="control-label">Alamat Rumah</label>
                                             <input type="text" class="form-control" id="address" value="<?php echo $address;?>" name="address" placeholder="Masuk Alamat Rumah" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="form-group has-danger">
                                         <label class="control-label">Tarikh Khidmat Pejabat Semasa</label>
                                       <input type="date"  class="form-control" id="currentdate1" value="<?php echo $currentdate1;?>" name="currentdate1" placeholder="" >
                                 </div>
                             </div>

                             <div class="col-md-6">
                                  <div class="form-group has-danger">
                                      <label class="control-label">Tarikh Lantikan Jawatan Semasa</label>
                                    <input type="date"  class="form-control" id="currentdate2" value="<?php echo $currentdate2;?>" name="currentdate2" placeholder="" >
                              </div>
                          </div>

                          <div class="col-md-6">
                              <div class="form-group">
                                  <label class="control-label">Pergerakan</label>
                                  <select name="modeofchange" class="form-control custom-select" data-toggle="dropdown" >
                               <option value=""> Pilih Pergerakan</option>
                          <option value="Pergerakan Setara" <?php if($row['modeofchange']=="Pergerakan Setara"){echo "selected";}?>>Pergerakan Setara</option>
                          <option value="Kenaikan Pangkat" <?php if($row['modeofchange']=="Kenaikan Pangkat"){echo "selected";}?>>Kenaikan Pangkat</option>


                                  </select>
                                  </div>
                          </div>
                          <div class="col-md-6">
                               <div class="form-group has-danger">
                                   <label class="control-label">Cadangan Penempatan Baru</label>
                                 <input type="text"  class="form-control" id="newplace" value="<?php echo $newplace;?>" name="newplace" placeholder="Masuk Penempatan Baru" >
                           </div>
                       </div>
                          <div class="col-md-6">
                               <div class="form-group has-danger">
                                   <label class="control-label">Jarak Kediaman Dari Pejabat Asal (KM)</label>
                                 <input type="text"  class="form-control" id="distancecurrent" value="<?php echo $distancecurrent;?>" name="distancecurrent" placeholder="Masuk Jarak" >
                           </div>
                       </div>
                       <div class="col-md-6">
                            <div class="form-group has-danger">
                                <label class="control-label">Jarak Kediaman Dari Pejabat Baru (KM)</label>
                              <input type="text"  class="form-control" id="distancenew" value="<?php echo $distancenew;?>" name="distancenew" placeholder="Masuk Jarak" >
                        </div>
                    </div>


                    <div class="col-md-6" >
                         <div class="form-group has-danger">
                             <label class="control-label">Perbezaan Jarak (KM)</label>
                           <input type="text"  class="form-control" id="total" value="<?php echo $total;?>" name="total"  placeholder="Masuk Jarak" readonly>
                     </div>
                    </div>

                    <!--div class="col-md-6">
                         <div class="form-group has-danger">
                             <label class="control-label">Pegawai Sebelum</label>
                           <input type="text"  class="form-control" id="takefrom" value="<?php echo $takefrom;?>" name="takefrom" placeholder="Masuk Nama">
                     </div>
                 </div-->
                 <div class="col-md-6">
                      <div class="form-group has-danger">
                          <label class="control-label">Jawatan Baru</label>
                          <select name="positionof" class="form-control custom-select" data-toggle="dropdown" >
                       <option value=""> Pilih Jawatan</option>
                  <option value="Guru Besar" <?php if($row['positionof']=="Guru Besar"){echo "selected";}?>>Guru Besar</option>
                  <option value="Guru Besar (Lantikan Baharu)" <?php if($row['positionof']=="Guru Besar (Lantikan Baharu)"){echo "selected";}?>>Guru Besar (Lantikan Baharu)</option>
                  <option value="Pengetua" <?php if($row['positionof']=="Pengetua"){echo "selected";}?>>Pengetua</option>
                  <option value="Guru Penolong Kanan Pentadbiran" <?php if($row['positionof']=="Guru Penolong Kanan Pentadbiran"){echo "selected";}?>>Guru Penolong Kanan Pentadbiran</option>
                  <option value="Guru Penolong Kanan Hal Ehwal Murid" <?php if($row['positionof']=="Guru Penolong Kanan Hal Ehwal Murid"){echo "selected";}?>>Guru Penolong Kanan Hal Ehwal Murid</option>
                  <option value="Guru Penolong Kanan Kokurikulum" <?php if($row['positionof']=="Guru Penolong Kanan Kokurikulum"){echo "selected";}?>>Guru Penolong Kanan Kokurikulum</option>
                  <option value="Guru Penolong Kanan Tingkatan 6" <?php if($row['positionof']=="Guru Penolong Kanan Tingkatan 6"){echo "selected";}?>>Guru Penolong Kanan Tingkatan 6</option>
                  <option value="Guru Penolong Kanan Pendidikan Khas" <?php if($row['positionof']=="Guru Penolong Kanan Pendidikan Khas"){echo "selected";}?>>Guru Penolong Kanan Pendidikan Khas</option>
                  <option value="Penyelia Petang" <?php if($row['positionof']=="Penyelia Petang"){echo "selected";}?>>Penyelia Petang</option>
                  <option value="Guru Kanan Matapelajaran Sains Dan Matematik" <?php if($row['positionof']=="Guru Kanan Matapelajaran Sains Dan Matematik"){echo "selected";}?>>Guru Kanan Matapelajaran Sains Dan Matematik</option>
                  <option value="Guru Kanan Matapelajaran TVET" <?php if($row['positionof']=="Guru Kanan Matapelajaran TVET"){echo "selected";}?>>Guru Kanan Matapelajaran TVET</option>
                  <option value="Guru Kanan Matapelajaran Bahasa" <?php if($row['positionof']=="Guru Kanan Matapelajaran Bahasa"){echo "selected";}?>>Guru Kanan Matapelajaran Bahasa</option>
                  <option value="Guru Kanan Matapelajaran Kemanusian" <?php if($row['positionof']=="Guru Kanan Matapelajaran Kemanusian"){echo "selected";}?>>Guru Kanan Matapelajaran Kemanusian</option>
                  <option value="Guru Akademik Biasa" <?php if($row['positionof']=="Guru Akademik Biasa"){echo "selected";}?>>Guru Akademik Biasa</option>
                  <option value=""<?php if($row['positionof']==""){echo "selected";}?>>Lain-lain</option>

                          </select>
                  </div>
              </div>


                                                    <div class="col-md-6">
                                                          <div class="form-group has-danger">
                                                              <label class="control-label">Jawatan Baru Lain-lain</label>
                                                               <input type="text" class="form-control" id="othersnewpost" value="<?php echo $othersnewpost;?>" name="othersnewpost" placeholder="Masuk Jawatan" >
                                                      </div>
                                                  </div>
              <div class="col-md-6">
                   <div class="form-group has-danger">
                       <label class="control-label">Justifikasi</label>
                     <input type="text"  class="form-control" id="justification" value="<?php echo $justification;?>" name="justification" placeholder="Masuk Justifikasi" >
               </div>
           </div>
           <div class="col-md-6">
                <div class="form-group has-danger">
                    <label class="control-label">Catatan</label>
                  <input type="text"  class="form-control" id="notes" value="<?php echo $notes;?>" name="notes" placeholder="Masuk Catatan" >
            </div>
        </div>
           <div class="col-md-6">
                <div class="form-group has-danger">
                    <label class="control-label">Gambar</label>

                    <input type="file" name="image" class="form-control" >
    <img src="../admin/upload/<?php echo $image;?>" width="150" height="150">
     <input type="hidden" name="old_img" value="<?php echo $image;?>">

            </div>
        </div>
        <!--div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Status</label>
                <select name="status" class="form-control custom-select" data-toggle="dropdown">
             <option value=""> Pilih Status</option>
        <option value="Diperaku" <?php if($row['status']=="Diperaku"){echo "selected";}?>>Diperaku</option>
        <option value="Tidak Diperaku" <?php if($row['status']=="Tidak Diperaku"){echo "selected";}?>>Tidak Diperaku</option>
        <option value="Simpan"<?php if($row['position']=="status"){echo "selected";}?>>Simpan</option>
          <option value="Tunggu"<?php if($row['position']=="status"){echo "selected";}?>>Tunggu</option>

                </select>
                </div>
        </div-->

        <!--div class="col-md-6">
             <div class="form-group has-danger">
                 <label class="control-label">Rujukan Kami</label>
               <input type="text"  class="form-control" id="ref1" value="<?php echo $ref1;?>" name="ref1" placeholder="Masuk No Rujukan">
         </div>
     </div>
     <div class="col-md-6">
          <div class="form-group has-danger">
              <label class="control-label">Tarikh Surat</label>
            <input type="text"  class="form-control" id="letterdate1" value="<?php echo $letterdate1;?>" name="letterdate1" placeholder="Masuk Tarikh">
      </div>
  </div-->
  <!--div class="col-md-6">
       <div class="form-group has-danger">
           <label class="control-label">Poskod</label>
         <input type="text"  class="form-control" id="postcode" value="<?php echo $postcode;?>" name="postcode" placeholder="Masuk Poskod">
   </div>
</div-->
<!--div class="col-md-6">
     <div class="form-group has-danger">
         <label class="control-label">Gred 1</label>
       <input type="text"  class="form-control" id="dg1" value="" name="dg1" placeholder="Masuk Gred 1">
 </div>
</div>
<div class="col-md-6">
     <div class="form-group has-danger">
         <label class="control-label">Gred 2</label>
       <input type="text"  class="form-control" id="dg2" value="" name="dg2" placeholder="Masuk Gred 2">
 </div>
</div>
<div class="col-md-6">
     <div class="form-group has-danger">
         <label class="control-label">Rujukan Kementerian</label>
       <input type="text"  class="form-control" id="ref2" value="" name="ref2" placeholder="Masuk No Rujukan">
 </div>
</div>
<div class="col-md-6">
     <div class="form-group has-danger">
         <label class="control-label">Tarikh Surat Kementerian</label>
       <input type="text"  class="form-control" id="letterdate2" value="" name="letterdate2" placeholder="Masuk Tarikh">
 </div>
</div-->
<div class="col-md-6">
     <div class="form-group has-danger">
         <label class="control-label">Tarikh Kuatkuasa </label>
       <input type="text"  class="form-control" id="startdate" value="<?php echo $startdate;?>" name="startdate" placeholder="Masuk Tarikh Kuatkuasa">
 </div>
</div>



                                  </div>


                              </div>
                                    <div class="form-actions">

                                      <button type="submit" class="btn btn-success" name="update"> <i class="fa fa-check" ></i> Kemas Kini</button>
                                        <a href="candidates4.php"><button type="button" class="btn btn-inverse">Batal</button></a>
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
