   
   <main id="main" class="main-page  ">

    <!--==========================
      Speaker Details Section
    ============================-->
    <section id="hubungiKami" class="bg-light wow fadeInUp mt-3 mb-3 p-3">
      <!-- container -->
      <div class="container">
        <!-- div section header -->
        <div class="section-header">
          <h2>Hubungi Kami</h2>
          <p>Justisia institute</p>
        </div>
        <!-- //div section header -->
        <!-- div row -->
        <div class="row">
          <!-- div col 6 -->
          <div class="col-md-12">
            <!-- div form -->
            <div class="form">
              <div id="sendmessage">Sampaikan aspirasi anda dengan mengisi form berikut :</div>
              <?= $this->session->flashdata('message'); ?>
              <div id="errormessage"></div>
              <form action="<?=base_url() ?>home/prosesAspirasi" method="post">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" value="<?= set_value('nama') ?>"/>
                    <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat" value="<?= set_value('alamat') ?>"/>
                    <?= form_error('alamat', '<small class="text-danger">', '</small>') ?>
                  </div>
                </div>
                <div class="form-row">              
                  <div class="form-group col-md-6">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?= set_value('email') ?>"/>
                    <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                  </div>
                  <div class="form-group col-md-6">                
                    <div class="form-group">
                      <label class="radio-inline h5 mt-2 ml-2"  for="Jk">
                        <input type="radio" name="jk" value="Laki-Laki" checked> Laki-Laki
                      </label>
                      <label class="radio-inline h5 mt-2 ml-2" for="Jk">
                        <input type="radio" name="jk" value="Perempuan" class="ml-2"> Perempuan
                      </label>
                    </div>
                    <?= form_error('jk', '<small class="text-danger">', '</small>') ?>
                  </div>
                </div>
                <div class="form-group">
                  <!-- <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" value="<?= set_value('subject') ?>"/> -->

                  <select class="form-control" id="subject" name="subject">
                    <option>Pertanyaan</option>
                    <option>Komentar</option>
                    <option>Aspirasi</option>
                  </select>
                  <?= form_error('subject', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="aspirasi" rows="5" placeholder="Tuliskan Aspirasi Anda"></textarea>              
                  <?= form_error('aspirasi', '<small class="text-danger">', '</small>') ?>
                </div>
                <small class="text-danger">*Aspirasi bisa berupa Komentar, Pertanyaan, atau pernyataan terkait aplikasi ini, tindak lanjut aspirasi akan ditindak lanjuti lewat email!!!</small>
                <div class="text-center"><button type="submit" class="btn btn-orange float-right mb-3"><i class="fas fa-send"></i> Kirim</button></div>
              </form>

            </div>
            <!-- // div form -->
            <br><br>

          </div>
          <!-- // div col 8 -->
          <!-- div col 4 -->
          <!-- <div class="col-md-4">
            <iframe src="https://www.google.co.id/maps/place/Bojonegoro+Institute/@-7.1641879,111.8776197,18.25z/data=!4m5!3m4!1s0x2e77818b53b65fbd:0xa0edfdbd26e510f5!8m2!3d-7.1642798!4d111.8785848" frameborder="0"></iframe>
          </div> -->
          <!-- //div col 4 -->
        </div>
        <!-- // div row -->
      </div>
      <!-- // container -->
    </section><!-- #contact -->
  </main>