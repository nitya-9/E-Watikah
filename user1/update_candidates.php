
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
        $stmt1 = $conn->prepare("SELECT * FROM candidate1 where id='".$_GET['id']."'");
     $stmt1->execute();
      $row=$stmt1->fetch(PDO::FETCH_ASSOC);

       $ppd=$row['ppd'];
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
           $postcode=$row['postcode'];
            $retiredate=$row['retiredate'];
             $address=$row['address'];
             $currentdate1=$row['currentdate1'];
           $currentdate2=$row['currentdate2'];
            //$modeofchange=$row['modeofchange'];
            $newplace=$row['newplace'];
            $distancecurrent=$row['distancecurrent'];
            $distancenew=$row['distancenew'];
            $total=$row['total'];
            $positionhist=$row['positionhist'];
            $positionhist2=$row['positionhist2'];
            $positionhist3=$row['positionhist3'];
            $placehist=$row['placehist'];
            $placehist2=$row['placehist2'];
            $placehist3=$row['placehist3'];
            $startdate1=$row['startdate1'];
            $startdate2=$row['startdate2'];
            $startdate3=$row['startdate3'];
            $enddate1=$row['enddate1'];
            $enddate2=$row['enddate2'];
            $enddate3=$row['enddate3'];
            $justification=$row['justification'];
              $notes=$row['notes'];
            //$takefrom=$row['takefrom'];
            $positionof=$row['positionof'];
            $othersnewpost=$row['othersnewpost'];

            $image=$row['image'];




     $data1=$stmt1->fetchAll();
    }


    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
     $_SESSION['reply'] = "Berjaya";
  header("location:../candidates.php");
    }

$conn = null;
?>

        <div class="page-wrapper">

            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Kemas Kini Maklumat Pegawai</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Kemas Kini Maklumat Pegawai</a></li>
                        <li class="breadcrumb-item active">Papan Pemuka</li>
                    </ol>
                </div>
            </div>


            <div class="container-fluid">
                  <div class="row">
                    <div class="col-lg-12">

                  <div class="card card-outline-primary">
                       <div class="card-body">
                            <form action="operations/candidate.php?edit_id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
                              <div class="form-body">
                                  <h3 class="card-title m-t-15">Maklumat Pegawai</h3>
                                  <hr>
                                  <div class="row p-t-20">

                               <div class="col-md-6">
                               <div class="form-group">
                              <label class="control-label">Pejabat Pendidikan Daerah </label>
                            <select name="ppd" class="form-control custom-select" data-toggle="dropdown" required>
                            <option value=""> Pilih PPD</option>
                            <option value="Seremban" <?php if($row['ppd']=="Seremban"){echo "selected";}?>>Seremban</option>
                            <option value="Rembau" <?php if($row['ppd']=="Rembau"){echo "selected";}?>>Rembau</option>
                            <option value="Tampin" <?php if($row['ppd']=="Tampin"){echo "selected";}?>>Tampin</option>
                            <option value="Jempol Dan Jelebu" <?php if($row['ppd']=="Jempol Dan Jelebu"){echo "selected";}?>>Jempol Dan Jelebu</option>
                            <option value="Port Dickson" <?php if($row['ppd']=="Port Dickson"){echo "selected";}?>>Port Dickson</option>
                            <option value="Kuala Pilah" <?php if($row['ppd']=="Kuala Pilah"){echo "selected";}?>>Kuala Pilah</option>


                            </select>
                              </div>
                              </div>



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
                                          <label class="control-label">Unit </label>
                                          <select name="unit" class="form-control custom-select" data-toggle="dropdown" required>
                                       <option value=""> Pilih Unit</option>
                                  <option value="Rendah" <?php if($row['unit']=="Rendah"){echo "selected";}?>>Rendah</option>
                                  <option value="Menengah" <?php if($row['unit']=="Menengah"){echo "selected";}?>>Menengah</option>
                                  <option value="PPD" <?php if($row['unit']=="PPD"){echo "selected";}?>>PPD</option>
                                    <option value="JPNNS" <?php if($row['unit']=="JPNNS"){echo "selected";}?>>JPNNS</option>

                                          </select>
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
                                             <input type="text" class="form-control" id="gred" value="<?php echo $gred;?>" name="gred" placeholder="Masuk Gred Penyandang" required>
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
                                             <input type="text" class="form-control" id="address" value="<?php echo $address;?>" name="address" placeholder="Masuk Alamat Rumah" required>
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

                          <!--div class="col-md-6">
                              <div class="form-group">
                                  <label class="control-label">Pergerakan</label>
                                  <select name="modeofchange" class="form-control custom-select" data-toggle="dropdown" >
                               <option value=""> Pilih Pergerakan</option>
                          <option value="Pergerakan Setara" <?php if($row['modeofchange']=="Pergerakan Setara"){echo "selected";}?>>Pergerakan Setara</option>
                          <option value="Kenaikan Pangkat" <?php if($row['modeofchange']=="Kenaikan Pangkat"){echo "selected";}?>>Kenaikan Pangkat</option>


                                  </select>
                                  </div>
                          </div-->
                          <div class="col-md-6">
                               <div class="form-group has-danger">
                                   <label class="control-label">Cadangan Penempatan Baru</label>
                                 <input type="text"  class="form-control" id="newplace" value="<?php echo $newplace;?>" name="newplace" placeholder="Masuk Penempatan Baru" required>
                           </div>
                       </div>
                          <div class="col-md-6">
                               <div class="form-group has-danger">
                                   <label class="control-label">Jarak Kediaman Dari Pejabat Asal (KM)</label>
                                 <input type="text"  class="form-control" id="distancecurrent" value="<?php echo $distancecurrent;?>" name="distancecurrent" placeholder="Masuk Jarak" required>
                           </div>
                       </div>
                       <div class="col-md-6">
                            <div class="form-group has-danger">
                                <label class="control-label">Jarak Kediaman Dari Pejabat Baru (KM)</label>
                              <input type="text"  class="form-control" id="distancenew" value="<?php echo $distancenew;?>" name="distancenew" placeholder="Masuk Jarak" required>
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

                          </select>           </div>
              </div>

              <div class="col-md-6">
                    <div class="form-group has-danger">
                        <label class="control-label">Jawatan Baru Lain-lain</label>
                         <input type="text" class="form-control" id="othersnewpost" value="<?php echo $othersnewpost;?>" name="othersnewpost" placeholder="Masuk Jawatan" >
                </div>
            </div>

            <div class="col-md-6">
                 <div class="form-group has-danger">
                     <label class="control-label">Pengalaman Kerja (Jawatan)</label><br>
                   <input type="text" class="form-control" id="positionhist" value="<?php echo $positionhist;?>" name="positionhist" placeholder="Masuk Jawatan" >
                   <input type="text" class="form-control" id="positionhist2" value="<?php echo $positionhist2;?>" name="positionhist2" placeholder="Masuk Jawatan" >
                   <input type="text" class="form-control" id="positionhist3" value="<?php echo $positionhist3;?>" name="positionhist3" placeholder="Masuk Jawatan" >

             </div>
         </div>

         <div class="col-md-6">
              <div class="form-group has-danger">
                  <label class="control-label">Pengalaman Kerja (Tempat Bertugas)</label><br>
                <input type="text" class="form-control" id="placehist" value="<?php echo $placehist;?>" name="placehist" placeholder="Masuk Tempat Bertugas" >
                <input type="text" class="form-control" id="placehist2" value="<?php echo $placehist2;?>" name="placehist2" placeholder="Masuk Tempat Bertugas" >
                <input type="text" class="form-control" id="placehist3" value="<?php echo $placehist3;?>" name="placehist3" placeholder="Masuk Tempat Bertugas" >

          </div>
      </div>

      <div class="col-md-6">
           <div class="form-group has-danger">
               <label class="control-label">Tarikh Mula</label><br>
             <input type="date" class="form-control" id="startdate1" value="<?php echo $startdate1;?>" name="startdate1" placeholder="" value="00-00-0000" >
             <input type="date" class="form-control" id="startdate2" value="<?php echo $startdate2;?>" name="startdate2" placeholder="" >
             <input type="date" class="form-control" id="startdate3" value="<?php echo $startdate3;?>" name="startdate3" placeholder="" >

       </div>
   </div>

   <div class="col-md-6">
        <div class="form-group has-danger">
            <label class="control-label">Tarikh Akhir</label><br>
          <input type="date" class="form-control" id="enddate1" value="<?php echo $enddate1;?>" name="enddate1" placeholder="" >
          <input type="date" class="form-control" id="enddate2" value="<?php echo $enddate2;?>" name="enddate2" placeholder="" >
          <input type="date" class="form-control" id="enddate3" value="<?php echo $enddate3;?>" name="enddate3" placeholder="" >

    </div>
</div>


              <div class="col-md-6">
                   <div class="form-group has-danger">
                       <label class="control-label">Justifikasi</label>
                     <input type="text"  class="form-control" id="justification" value="<?php echo $justification;?>" name="justification" placeholder="Masuk Justifikasi" required>
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

                                  </div>


                              </div>
                                    <div class="form-actions">

                                      <button type="submit" class="btn btn-success" name="update"> <i class="fa fa-check" ></i> Kemas Kini</button>
                                        <a href="candidates.php"><button type="button" class="btn btn-inverse">Batal</button></a>
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
