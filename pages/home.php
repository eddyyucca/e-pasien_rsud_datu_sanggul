<?php
if (strpos($_SERVER['REQUEST_URI'], "pages")) {
     exit(header("Location:../index.php"));
}

$besok                  = date("Y-m-d", strtotime("+1 day"));
$thnbesok               = substr($besok, 0, 4);
$blnbesok               = substr($besok, 5, 2);
$tglbesok               = substr($besok, 8, 2);
?>
<section id="home" class="slider" data-stellar-background-ratio="0.5">
     <div class="container">
          <div class="row">
               <div class="owl-carousel owl-theme">
                    <div class="item item-first">
                         <div class="caption">
                              <div class="col-md-offset-1 col-md-10">
                                   <h3>Mari buat hidupmu lebih bahagia</h3>
                                   <h1>Hidup Sehat</h1>
                                   <a href="#team" class="section-btn btn btn-default smoothScroll">Temui Dokter Kami</a>
                              </div>
                         </div>
                    </div>
                    <div class="item item-second">
                         <div class="caption">
                              <div class="col-md-offset-1 col-md-10">
                                   <h3>Kami usahakan yang terbaik untuk Anda</h3>
                                   <h1>Jadikan Kami Sahabat Anda</h1>
                                   <a href="#about" class="section-btn btn btn-default btn-gray smoothScroll">Lebih Banyak Tentang Kami</a>
                              </div>
                         </div>
                    </div>
                    <div class="item item-third">
                         <div class="caption">
                              <div class="col-md-offset-1 col-md-10">
                                   <h3>Jangan sampai waktu anda bersama keluarga menjadi terganggu</h3>
                                   <h1>Manfaatkan Kesehatan Anda</h1>
                                   <a href="#news" class="section-btn btn btn-default btn-blue smoothScroll">Lihat Jadwal Dokter</a>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</section>

<!-- ABOUT -->
<section id="about">
     <div class="container">
          <div class="row">
               <div class="col-md-6 col-sm-6">
                    <div class="about-info">
                         <h2 class="wow fadeInUp" data-wow-delay="0.6s">Selamat datang di <br> RSUD Datu Sanggul Rantau</h2>
                         <div class="wow fadeInUp" data-wow-delay="0.8s">
                              <p>
                                   Rumah Sakit Umum Daerah Datu Sanggul Rantau dibangun sejak tahun 1980
                                   dengan biaya dari APBN yang melalui DIP Proyek
                                   Pengembangan RSU Prop/Kab/Kodya Kalimantan Selatan. Dengan Luas lahan 13.771 dan Luas bangunan 4210 M2. Diresmikan bertepatan dengan Hari Kesehatan Nasional ke XIX tanggal 12
                                   Nopember 1983 oleh Gubernur Kalimantan Selatan Bapak H. Mistar Cokro Koesomo.
                                   <br>
                                   Rumah Sakit Umum Datu Sanggul merupakan satu-satunya Rumah Sakit Umum
                                   milik Pemerintah Kabupaten Tapin sejak tahun 1983 masih berstatus
                                   tipe D kemudian naik kelas menjadi tipe C dengan SK Menkes RI
                                   Nomor 1177/Menkes/SK/X/2004. <br>
                                   Pada tanggal 07 sampai dengan 10 Oktober 2019, Rumah Sakit Umum Datu Sanggul Rantau melaksanakan re Akreditasai SNARS oleh Komisi Akreditasi Rumah Sakit/KARS dan berhasil lulus tingkat Madya (bintang tiga)


                              </p>
                         </div>
                         <figure class="profile wow fadeInUp" data-wow-delay="1s">
                              <!-- derektur -->
                              <img src="images/author-image.jpg" class="img-responsive" alt="" />
                              <!-- derektur -->
                              <figcaption>
                                   <h3>dr. H. MILHAN, Sp.OG(K)-Obginsos., MM</h3>
                                   <p>Direktur RSUD Datu Sanggul</p>
                              </figcaption>
                         </figure>
                    </div>
               </div>
          </div>
     </div>
</section>

<!-- TEAM -->
<section id="team" data-stellar-background-ratio="1">
     <div class="container">
          <div class="row">
               <div class="col-md-12 col-sm-12">
                    <div class="about-info">
                         <h2 class="section-title wow fadeInUp" data-wow-delay="0.3s">
                              <center>Dokter Kami</center>
                         </h2>
                    </div>
               </div>
               <div class="clearfix"></div>
               <?php
               if (!isset($_SESSION["dokter"])) {
                    $delay          = 0.2;
                    $datadokter     = "";
                    $querydokter = bukaquery("select dokter.kd_dokter,left(dokter.nm_dokter,50) as dokter,spesialis.nm_sps,dokter.no_ijn_praktek,pegawai.photo,dokter.no_telp from dokter inner join spesialis on dokter.kd_sps=spesialis.kd_sps inner join pegawai on dokter.kd_dokter=pegawai.nik where dokter.status='1' and dokter.kd_dokter<>'-' group by spesialis.nm_sps limit 5");
                    while ($rsquerydokter = mysqli_fetch_array($querydokter)) {
                         $datadokter = $datadokter .
                              "<div class='col-md-4 col-sm-6'>
                                    <div class='team-thumb wow fadeInUp' data-wow-delay='" . $delay . "s'>
                                       <div class='team-info'>
                                               <h3>$rsquerydokter[1]</h3>
                                               <p>$rsquerydokter[2]</p>
                                               <div class='team-contact-info'>
                                                    <p><i class='fa fa-phone'></i> HP/Telp. $rsquerydokter[5] </p>
                                                    <p><i class='fa fa-envelope-o'></i> No.SIP. $rsquerydokter[3] </p>
                                               </div>
                                               
                                          </div>
                                    </div>
                                    <br/>
                               </div>";
                         $delay = $delay + 0.2;
                    }
                    $_SESSION["dokter"] = $datadokter;
               }

               echo $_SESSION["dokter"];
               ?>
               <div class="col-md-4 col-sm-6">
                    <div class="wow fadeInUp" data-wow-delay="<?= $delay; ?>s">
                         <br /><br /><br /><br />
                         <center><a href='index.php?act=DokterKami' class="btn btn-warning">Tampilkan Semua Dokter</a></center>
                    </div>
               </div>

          </div>
     </div>
</section>

<!-- Jadwal -->
<section id="news" data-stellar-background-ratio="2.5">
     <div class="container">
          <div class="row">
               <div data-mc-src="453149c3-e690-42a0-adee-d57c9d78e2d1"></div>
               <div class="col-md-12 col-sm-12">
                    <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                         <h2>Jadwal Praktek Dokter</h2>
                    </div>
                    <div class="news-thumb wow fadeInUp" data-wow-delay="0.4s">
                         <form id="carikeyword" name="frmCariJadwal" method="post" action="" enctype=multipart/form-data>
                              <table width="100%" border='0' align="center">
                                   <tr class="head">
                                        <td width="20%" align="right"><label for="keyword">Keyword</label></td>
                                        <td width="1%"><label for=":">&nbsp;:&nbsp;</label></td>
                                        <td width="60%"><input name="keyword" type="text" id="keyword" pattern="[a-zA-Z0-9, ./@_]{1,65}" title=" a-zA-Z0-9, ./@_" class="form-control" value="" size="65" maxlength="250" autocomplete="off" /></td>
                                        <td width="19%" align="left">&nbsp;<input name="BtnKeyword" type=submit class="btn btn-warning" value="Cari"></td>
                                   </tr>
                              </table>
                         </form>
                         <div id='hasilcari'></div>
                    </div>
               </div>
          </div>
     </div>
</section>

<!-- MAKE AN APPOINTMENT -->
<section id="appointment" data-stellar-background-ratio="3">
     <div class="container">
          <div class="row">
               <script src="https://cdn2.woxo.tech/a.js#6010c3427e1f560015b71756" async data-usrc>
               </script>
               <div class="col-md-6 col-sm-6">
                    <!-- Foto 2 -->
                    <img src="images/appointment-image.jpg" class="img-responsive" alt="">
                    <!-- foto 2 -->
               </div>
               <div class="col-md-6 col-sm-6">
                    <form id="appointment-form" role="form" onsubmit="return validasiIsi();" method="post" action="index.php?act=PendaftaranPeriksa" enctype=multipart/form-data>
                         <div class="about-info wow fadeInUp" data-wow-delay="0.4s">
                              <h2>
                                   <center>Buat Janji/Booking</center>
                              </h2>
                              <div class="col-md-12 col-sm-12">
                                   <label for="nama">Nama</label>
                                   <input type="text" class="form-control text-uppercase" onkeydown="setDefault(this, document.getElementById('MsgIsi1'));" id="TxtIsi1" pattern="[a-zA-Z0-9, ./@_]{1,40}" title=" a-zA-Z0-9, ./@_ (Maksimal 40 karakter)" required name="nama" maxlength="40" placeholder="Nama Anda" autocomplete="off" />
                                   <span id="MsgIsi1" style="color:#CC0000; font-size:10px;"></span>
                              </div>
                              <div class="col-md-12 col-sm-12">
                                   <label for="alamat">Alamat</label>
                                   <input type="text" class="form-control text-uppercase" onkeydown="setDefault(this, document.getElementById('MsgIsi2'));" id="TxtIsi2" pattern="[a-zA-Z0-9, ./@_]{1,200}" title=" a-zA-Z0-9, ./@_ (Maksimal 200 karakter)" required name="alamat" maxlength="200" placeholder="Alamat Anda" autocomplete="off" />
                                   <span id="MsgIsi2" style="color:#CC0000; font-size:10px;"></span>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                   <label for="nohp">Nomor HP/Telephone</label>
                                   <input type="tel" class="form-control" onkeydown="setDefault(this, document.getElementById('MsgIsi3'));" id="TxtIsi3" pattern="[0-9]{1,40}" title=" 0-9 (Maksimal 40 karakter)" required name="nohp" maxlength="40" placeholder="Nomor HP/Telephone Anda" autocomplete="off" />
                                   <span id="MsgIsi3" style="color:#CC0000; font-size:10px;"></span>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                   <label for="email">Email</label>
                                   <input type="email" class="form-control" onkeydown="setDefault(this, document.getElementById('MsgIsi4'));" id="TxtIsi4" pattern="[a-zA-Z0-9, ./@_]{1,50}" title=" a-zA-Z0-9, ./@_ (Maksimal 50 karakter)" required name="email" maxlength="50" placeholder="Email Anda" autocomplete="off" />
                                   <span id="MsgIsi4" style="color:#CC0000; font-size:10px;"></span>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                   <label for="tanggal">Pilih Tanggal</label>
                                   <table width="100%">
                                        <tr>
                                             <td>
                                                  <select name="TglDaftar" class="form-control">
                                                       <?php
                                                       echo "<option>$tglbesok</option>";
                                                       loadTgl2();
                                                       ?>
                                                  </select>
                                             </td>
                                             <td>
                                                  <select name="BlnDaftar" class="form-control">
                                                       <?php
                                                       echo "<option>$blnbesok</option>";
                                                       loadBln2();
                                                       ?>
                                                  </select>
                                             </td>
                                             <td>
                                                  <select name="ThnDaftar" class="form-control">
                                                       <?php
                                                       echo "<option>$thnbesok</option>";
                                                       loadThn4();
                                                       ?>
                                                  </select>
                                             </td>
                                        </tr>
                                   </table>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                   <label for="poli">Poliklinik/Unit Penunjang</label>
                                   <select name="poli" class="form-control">
                                        <?php
                                        if (!isset($_SESSION["poli"])) {
                                             $datapoli   = "";
                                             $querypoli  = bukaquery("SELECT * from poliklinik order by nm_poli");
                                             while ($rsquerypoli = mysqli_fetch_array($querypoli)) {
                                                  $datapoli = $datapoli . "<option value='$rsquerypoli[0]'>$rsquerypoli[1]</option>";
                                             }
                                             $_SESSION["poli"] = $datapoli;
                                        }

                                        echo $_SESSION["poli"];
                                        ?>
                                   </select>
                              </div>
                              <div class="col-md-12 col-sm-12">
                                   <label for="pesan">Tambahan Pesan</label>
                                   <textarea class="form-control" rows="2" maxlength="400" onkeydown="setDefault(this, document.getElementById('MsgIsi5'));" id="TxtIsi5" required name="pesan" placeholder="Tambahan Pessan" autocomplete="off"></textarea>
                                   <span id="MsgIsi5" style="color:#CC0000; font-size:10px;"></span>
                                   <button type="submit" class="form-control" id="cf-submit" name="btnBooking">Kirimkan</button>
                              </div>
                              <div class="col-md-12 col-sm-12">
                                   <label><a href="index.php?act=CekBooking" class="btn btn-danger">Cek Booking</a> untuk melihat status booking Anda. Sudah pernah periksa sebelumnya? Silahkan <a href="index.php?act=LoginPasien" class="btn btn-success">Log In</a></label><br /><br />
                              </div>
                         </div>
                    </form>
               </div>
          </div>
     </div>
</section>

<section id="google-map">
     <iframe src="https://maps.google.com/maps?q=rsud%20datu%20sanggul&t=&z=15&ie=UTF8&iwloc=&output=embed" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen="true"></iframe>
</section>