  <main id="main" class="main-page  ">

    <!--==========================
      Speaker Details Section
    ============================-->
    <section id="speakers-details" class="wow fadeIn">
      <div class="container">
        <div class="text-center">
          <h2 class=" text-uppercase" style="font-size: 26px"><b>Data Kekerasan Perempuan dan Anak di Kabupaten <?= $kabupaten ?></b></h2>
          <h5 style="color: gray;opacity: 80%"><b>Justisia Institute</b></h5>
          <hr width="20%" style="color:red;border:3px solid red;margin-top: -2px">
        </div>
        <br>
        <form method="post" action="<?= base_url() ?>data/cariGender">
          <div class="form-row">            
            <div class="col-md-3">
              <div class="form-group">                
                <label class="sr-only" for="tahun">Tahun</label>
                <select  class="form-control" id="tahun" name="tahun">
                  <option>2018</option>
                  <option>2019</option>
                </select>
              </div>
            </div>     
            <div class="col-md-3">
              <div class="form-group">                
                <label class="sr-only" for="Kabupaten">Kabupaten</label>
                <select  class="form-control" id="kabupaten" name="kabupaten">
                  <option>Bojonegoro</option>
                  <!-- <option>Tuban</option> -->
                </select>
              </div>
            </div>     
            <div class="col-md-5">
              <div class="form-group">              
                <label class="sr-only" for="kategori">Kategori</label>
                <select  class="form-control" id="kategori" name="kategori">
                  <option>Kekerasan Perempuan dan Anak</option>
                </select>                
              </div>
            </div>     
            <div class="col-md-1">
              <div class="form-group">
                <button type="submit" class="btn btn-primary mb-2 float-right">Submit</button>                
              </div>
            </div>     
          </div>
        </form>

        <div class="row mb-3"> 
          <div class="col">
            
          <div class="p-3 border">
            <center><h4 class="text-capitalize">Jumlah Kekerasan Perempuan dan Anak di Kabupaten <?= $kabupaten ?> <?= $tahun ?></h4></center>
            <br>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <?php  
                for ($i=0;$i<=2;$i++) {
                ?>
                <tr>
                  <td><b>&sum;</b> <?= $genders[$i]['kat'] ?></td>
                  <td class="text-center"><?= $genders[$i]['jum'] ?></td>
                  <td><b>&sum;</b> <?= $genders[$i+3]['kat'] ?></td>
                  <td class="text-center"><?= $genders[$i+3]['jum'] ?></td>
                </tr>                
                <?php
                }
                ?>
              </tbody>
            </table>           
          </div>
          </div>
        </div>  

        <div class="form-row">

        <?php 
        $judul = ['Kekerasan Perempuan dan Anak', 'Grafik KDRT Perempuan', 'Grafik KDRT Anak', 'Grafik KDRT Perempuan dan Anak', 'Grafik Non KDRT Perempuan', 'Grafik Non KDRT Anak', 'Grafik Non KDRT Perempuan dan Anak'];
        for ($i=1; $i <= 7 ; $i++) { 
        ?>
          <div class="col-md-12 mb-2">
            <div class="accordion" id="accordionExample">              
              <div class="card">
                <div class="card-header" id="headingOne" class="card-header" id="headingOne" style="padding: 0">
                  <h2 class="mb-0 mt-1">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?= $i ?>" aria-expanded="true" aria-controls="collapseOne" style="color: black">
                      <?= $judul[$i-1] ?>
                    </button>
                  </h2>
                </div>

                <div id="collapse<?= $i ?>" class="collapse <?php if($i == 1) {echo "show";} ?>" aria-labelledby="headingOne" data-parent="#accordionExample">
                  <div class="card-body">
                    <div id="chart<?= $i ?>"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>  
        
        <?php
        }
        ?>   
        </div>


      </div>
    </section>

  </main>
<!-- <?php var_dump($genders) ?> -->