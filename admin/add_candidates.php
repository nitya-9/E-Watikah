<?php
require_once('check_login.php');
?>
<?php include"header.php"?>

<?php include"sidebar.php"?>
<?php
include"config.php";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $stmt1 = $conn->prepare("SELECT * FROM candidate");
   $stmt1->execute();

   $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC);
   $travellers1=$stmt1->fetchAll();


}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>


        <div class="page-wrapper">

            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Cadangan Pegawai Unit Rendah</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Cadangan Pengawai Unit Rendah</a></li>
                        <li class="breadcrumb-item active">Papan Pemuka</li>
                    </ol>
                </div>
            </div>


            <div class="container-fluid">
                  <div class="row">
                    <div class="col-lg-12">

                  <div class="card card-outline-primary">
                       <div class="card-body">
                             <form action="operations/candidate.php" method="post"  enctype="multipart/form-data">
                                    <div class="form-body">
                                        <h3 class="card-title m-t-15">Maklumat Pegawai</h3>
                                        <hr>
                                        <div class="row p-t-20">

                                          <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Pejabat Pendidikan Daerah</label>
                                                    <select name="ppd" class="form-control custom-select" data-toggle="dropdown" required>
                                                 <option value=""> Pilih PPD</option>
                                            <option value="Seremban">Seremban</option>
                                            <option value="Rembau">Rembau</option>
                                            <option value="Tampin">Tampin</option>
                                              <option value="Jempol Dan Jelebu">Jempol Dan Jelebu</option>
                                              <option value="Port Dickson">Port Dickson</option>
                                              <option value="Kuala Pilah">Kuala Pilah</option>



                                                    </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                              <div class="form-group has-danger">
                                                  <label class="control-label">Aliran</label>
                                                   <input type="text" class="form-control" id="flow" name="flow" placeholder="Masuk Aliran" required>
                                          </div>
                                      </div>

                                      <div class="col-md-6">
                                            <div class="form-group has-danger">
                                                <label class="control-label">ID</label>
                                                 <input type="text" class="form-control" id="no" name="no" placeholder="Masuk ID" required>
                                        </div>
                                    </div>


                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label class="control-label">Unit </label>
                                                  <select name="unit" class="form-control custom-select" data-toggle="dropdown" required>
                                               <option value=""> Pilih Unit</option>
                                          <option value="Rendah">Rendah</option>
                                          <option value="Menengah">Menengah</option>
                                          <option value="PPD">PPD</option>
                                            <option value="JPNNS">JPNNS</option>

                                                  </select>
                                                  </div>
                                          </div>


                                        <div class="col-md-6">
                                              <div class="form-group has-danger">
                                                  <label class="control-label">Nama</label>
                                                   <input type="text" class="form-control" id="name" name="name" placeholder="Masuk Nama" required>
                                          </div>
                                      </div>

                                        <div class="col-md-6">
                                              <div class="form-group has-danger">
                                                  <label class="control-label">No. I/C</label>
                                                   <input type="text" class="form-control" id="icno" name="icno" placeholder="Masuk No. I/C" required>
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label class="control-label">Jawatan Semasa</label>
                                              <select name="position" class="form-control custom-select" data-toggle="dropdown" required>
                                           <option value=""> Pilih Jawatan</option>
                                      <option value="Guru Besar">Guru Besar</option>
                                      <option value="Pengetua">Pengetua</option>
                                      <option value="Guru Penolong Kanan Pentadbiran">Guru Penolong Kanan Pentadbiran</option>
                                      <option value="Guru Penolong Kanan Hal Ehwal Murid">Guru Penolong Kanan Hal Ehwal Murid</option>
                                      <option value="Guru Penolong Kanan Kokurikulum">Guru Penolong Kanan Kokurikulum</option>
                                      <option value="Guru Penolong Kanan Tingkatan 6">Guru Penolong Kanan Tingkatan 6</option>
                                      <option value="Guru Penolong Kanan Pendidikan Khas">Guru Penolong Kanan Pendidikan Khas</option>
                                      <option value="Penyelia Petang">Penyelia Petang</option>
                                      <option value="Guru Kanan Matapelajaran Sains Dan Matematik">Guru Kanan Matapelajaran Sains Dan Matematik</option>
                                      <option value="Guru Kanan Matapelajaran TVET">Guru Kanan Matapelajaran TVET</option>
                                      <option value="Guru Kanan Matapelajaran Bahasa">Guru Kanan Matapelajaran Bahasa</option>
                                      <option value="Guru Kanan Matapelajaran Kemanusian">Guru Kanan Matapelajaran Kemanusian</option>
                                      <option value="Guru Akademik Biasa">Guru Akademik Biasa</option>
                                      <option value="">Lain-lain</option>

                                              </select>
                                              </div>
                                      </div>







                                            <div class="col-md-6">
                                                  <div class="form-group has-danger">
                                                      <label class="control-label">Jawatan Semasa Lain-lain</label>
                                                       <input type="text" class="form-control" id="others" name="others" placeholder="Masuk Jawatan">
                                              </div>
                                          </div>








                                        <div class="col-md-6">
                                              <div class="form-group has-danger">
                                                  <label class="control-label">Gred Hakiki</label>
                                                   <input type="text" class="form-control" id="actgred" name="actgred" placeholder="Masuk Gred Hakiki" required>
                                          </div>
                                      </div>

                                        <div class="col-md-6">
                                              <div class="form-group has-danger">
                                                  <label class="control-label">Gred Penyandang</label>
                                                   <input type="text" class="form-control" id="gred" name="gred" placeholder="Masuk Gred Penyandang" >
                                          </div>
                                      </div>


                                        <div class="col-md-6">
                                              <div class="form-group has-danger">
                                                  <label class="control-label">Tempat Bertugas</label>
                                                   <input type="text" class="form-control" id="workplace" name="workplace" placeholder="Masuk Tempat Bertugas" required>
                                          </div>
                                      </div>

                                      <div class="col-md-6">
                                            <div class="form-group has-danger">
                                                <label class="control-label">Poskod</label>
                                                 <input type="text" class="form-control" id="postcode" name="postcode" placeholder="Masuk Poskod Tempat Bertugas" >
                                        </div>
                                    </div>

                                           <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Tarikh Bersara</label>
                                                  <input type="date"  class="form-control" id="retiredate" name="retiredate" placeholder="" >
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                              <div class="form-group has-danger">
                                                  <label class="control-label">Alamat Rumah</label>
                                                   <input type="text" class="form-control" id="address" name="address" placeholder="Masuk Alamat Rumah" >
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                           <div class="form-group has-danger">
                                               <label class="control-label">Tarikh Khidmat Pejabat Semasa</label>
                                             <input type="date"  class="form-control" id="currentdate1" name="currentdate1" placeholder="" >
                                       </div>
                                   </div>

                                   <div class="col-md-6">
                                        <div class="form-group has-danger">
                                            <label class="control-label">Tarikh Lantikan Jawatan Semasa</label>
                                          <input type="date"  class="form-control" id="currentdate2" name="currentdate2" placeholder="" >
                                    </div>
                                </div>

                                <!--div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Pergerakan</label>
                                        <select name="modeofchange" class="form-control custom-select" data-toggle="dropdown" >
                                     <option value=""> Pilih Pergerakan</option>
                                <option value="Pergerakan Setara">Pergerakan Setara</option>
                                <option value="Kenaikan Pangkat">Kenaikan Pangkat</option>


                                        </select>
                                        </div>
                                </div-->
                                <div class="col-md-6">
                                     <div class="form-group has-danger">
                                         <label class="control-label">Cadangan Penempatan Baru</label>
                                       <input type="text"  class="form-control" id="newplace" name="newplace" placeholder="Masuk Penempatan Baru" >
                                 </div>
                             </div>
                                <div class="col-md-6">
                                     <div class="form-group has-danger">
                                         <label class="control-label">Jarak Kediaman Dari Pejabat Asal (KM)</label>
                                       <input type="text"  class="form-control" id="distancecurrent" name="distancecurrent" placeholder="Masuk Jarak" >
                                 </div>
                             </div>
                             <div class="col-md-6">
                                  <div class="form-group has-danger">
                                      <label class="control-label">Jarak Kediaman Dari Pejabat Baru (KM)</label>
                                    <input type="text"  class="form-control" id="distancenew" name="distancenew" placeholder="Masuk Jarak" >
                              </div>
                          </div>


                          <div class="col-md-6" >
                               <div class="form-group has-danger">
                                   <label class="control-label">Perbezaan Jarak (KM)</label>
                                 <input type="text"  class="form-control" id="total" name="total"  placeholder="Masuk Jarak" readonly>
                           </div>
                          </div>


                          <!--div class="col-md-6">
                               <div class="form-group has-danger">
                                   <label class="control-label">Pegawai Sebelum</label>
                                 <input type="text"  class="form-control" id="takefrom" name="takefrom" placeholder="Masuk Nama">
                           </div>
                       </div-->
                       <div class="col-md-6">
                            <div class="form-group has-danger">
                                <label class="control-label">Jawatan Baru</label>

                              <select name="positionof" class="form-control custom-select" data-toggle="dropdown" >
                           <option value=""> Pilih Jawatan</option>
                      <option value="Guru Besar">Guru Besar</option>
                      <option value="Guru Besar">Guru Besar (Lantikan Baharu)</option>
                      <option value="Pengetua">Pengetua</option>
                      <option value="Guru Penolong Kanan Pentadbiran">Guru Penolong Kanan Pentadbiran</option>
                      <option value="Guru Penolong Kanan Hal Ehwal Murid">Guru Penolong Kanan Hal Ehwal Murid</option>
                      <option value="Guru Penolong Kanan Kokurikulum">Guru Penolong Kanan Kokurikulum</option>
                      <option value="Guru Penolong Kanan Tingkatan 6">Guru Penolong Kanan Tingkatan 6</option>
                      <option value="Guru Penolong Kanan Pendidikan Khas">Guru Penolong Kanan Pendidikan Khas</option>
                      <option value="Penyelia Petang">Penyelia Petang</option>
                      <option value="Guru Kanan Matapelajaran Sains Dan Matematik">Guru Kanan Matapelajaran Sains Dan Matematik</option>
                      <option value="Guru Kanan Matapelajaran TVET">Guru Kanan Matapelajaran TVET</option>
                      <option value="Guru Kanan Matapelajaran Bahasa">Guru Kanan Matapelajaran Bahasa</option>
                      <option value="Guru Kanan Matapelajaran Kemanusian">Guru Kanan Matapelajaran Kemanusian</option>
                      <option value="Guru Akademik Biasa">Guru Akademik Biasa</option>
                      <option value="">Lain-lain</option>

                              </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                          <div class="form-group has-danger">
                              <label class="control-label">Jawatan Baru Lain-lain</label>
                               <input type="text" class="form-control" id="othersnewpost" name="othersnewpost" placeholder="Masuk Jawatan">
                      </div>
                  </div>



                  <div class="col-md-6">
                        <div class="form-group has-danger">
                            <label class="control-label"> Pengalaman Kerja (Jawatan)</label>
                             <input type="text" class="form-control" id="positionhist" name="positionhist" placeholder="Masuk Jawatan">
                             <input type="text" class="form-control" id="positionhist2" name="positionhist2" placeholder="Masuk Jawatan">
                             <input type="text" class="form-control" id="positionhist3" name="positionhist3" placeholder="Masuk Jawatan">




                    </div>
                </div>

                <div class="col-md-6">
                      <div class="form-group has-danger">
                          <label class="control-label">Pengalaman Kerja (Tempat Bertugas)</label>
                           <input type="text" class="form-control" id="placehist" name="placehist" placeholder="Masuk Tempat Bertugas">
                           <input type="text" class="form-control" id="placehist2" name="placehist2" placeholder="Masuk Tempat Bertugas">
                           <input type="text" class="form-control" id="placehist3" name="placehist3" placeholder="Masuk Tempat Bertugas">
                  </div>
              </div>

              <div class="col-md-6">
                   <div class="form-group has-danger">
                       <label class="control-label">Tarikh Mula</label>
                     <input type="date"  class="form-control" id="startdate1" name="startdate1" placeholder="" >
                     <input type="date"  class="form-control" id="startdate2" name="startdate2" placeholder="" >
                     <input type="date"  class="form-control" id="startdate3" name="startdate3" placeholder="" >

               </div>
           </div>

           <div class="col-md-6">
                <div class="form-group has-danger">
                    <label class="control-label">Tarikh Akhir</label>
                  <input type="date"  class="form-control" id="enddate1" name="enddate1" placeholder="" value="00-00-0000" >
                  <input type="date"  class="form-control" id="enddate2" name="enddate2" placeholder="" >
                  <input type="date"  class="form-control" id="enddate3" name="enddate3" placeholder="" >

            </div>
        </div>


                    <div class="col-md-6">
                         <div class="form-group has-danger">
                             <label class="control-label">Justifikasi</label>
                           <input type="text"  class="form-control" id="justification" name="justification" placeholder="Masuk Justifikasi" >
                     </div>
                 </div>
                 <div class="col-md-6">
                      <div class="form-group has-danger">
                          <label class="control-label">Catatan</label>
                        <input type="text"  class="form-control" id="notes" name="notes" placeholder="Masuk Catatan" >
                  </div>
              </div>
                 <div class="col-md-6">
                      <div class="form-group has-danger">

     <label class="form-label">Gambar</label>
     <input type="file"
            class="form-control"
            name="image" >
            <img src="../admin/upload/<?php echo $image;?>" width="20" height="20">
             <input type="hidden" name="old_img" value="<?php echo $image;?>">
   </div>


                  </div>
                  <!--div class="col-md-6">
                      <div class="form-group">
                          <label class="control-label">Status</label>
                          <select name="status" class="form-control custom-select" data-toggle="dropdown">
                       <option value=""> Pilih Status</option>
                  <option value="Diperaku">Diperaku</option>
                  <option value="Tidak Diperaku">Tidak Diperaku</option>
                  <option value="Simpan">Simpan</option>
                  <option value="Tunggu">Tunggu</option>

                          </select>
                          </div>
                  </div-->
              </div>
            </div>





                                    <div class="form-actions">

                                        <button type="submit" class="btn btn-success" name="submit" id="btnValidate"> <i class="fa fa-check" ></i>Simpan</button>
                                        <a href="add_candidates.php"><button type="button" class="btn btn-inverse">Batal</button></a>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
                </div>

            </div>


<?php include"footer.php"?>

            <div class="popup popup--icon -error js_error-popup" id="show_error">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Ralat
    </h1>
    <p>Sila masuk tarikh yang sah</p>
    <p>

     <button class="button button--error" data-for="js_error-popup">Tutup</button>

    </p>
  </div>
</div>
