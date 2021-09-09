<main id="main" class="main-page">
    <section id="ttgAplikasi" class="wow fadeInUp mt-3 p-3">
      <div class="container mt-3">
        <div class="row">
            <!-- col -->
            <div class="col-md-5">
                <img src="<?= base_url() ?>assets/images/donate.png" alt="" class="img-fluid">
            </div>
            <!-- //col -->
            <!-- col -->
            <div class="col-md-7 mt-3">
                <!-- section header -->
                <div class="section-header mt-3 mb-3">
                    <h2>BERI DUKUNGAN PADA KAMI</h2>
                    <!-- <p>Justisia institute</p> -->
                </div>
                <!-- // section header -->
                <br>
                <!-- row -->
                <div class="row">
                    <!-- col -->
                    <div class="col-md-12">
                        <h6 class="text-center">Kami sudah sangat bahagia, jika Anda mengakses dan menyukai konten yang ada di website kami. Tapi jika ingin berbagi dan mendukung kami untuk selalu menghadirkan konten-konten terbaik, Anda bisa memberikan donasi di sini:</h6>
                    </div>
                    <!-- // col -->
                </div>
                <!-- //row -->
                <br>
                <!-- row -->
                <div class="row">
                    <!-- col -->
                    <div class="col-md-8">
                        <div class="border mt-3 p-3 mt-2 mb-2"><!-- row -->
                            <div class="form-row">
                                <!-- col -->
                                <div class="col-2">
                                    <img src="<?= base_url() ?>assets/images/ovo.svg" alt="" class="img-fluid">
                                </div>
                                <!-- // col -->
                                <!-- col -->
                                <div class="col-8">
                                    <?php $ovoid = '082237889370' ?>
                                    <p class="mb-0 mt-0"><b>OVO - PRC Initiative</b></p>
                                    <p class="mb-0 mt-0" onclick="myfunct()" id="idovo"><?= $ovoid ?></p>
                                </div>
                                <!-- // col -->
                                <!-- col -->
                                <div class="col-2">
                                <input type="text" value="<?= $ovoid ?>" id="ovoid" style="display:none;">
                                    <a href="#" class="center-links mt-3" style="margin-left:-10px" onclick="myfunct()"><b>SALIN</b></a>
                                </div>
                                <!-- // col -->
                            </div>
                            <!-- // row -->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <center>
                            <h6>Atau Scan Barcode:</h6>
                            <img src="<?= base_url() ?>/assets/home/img/ovobarcode.jpg" alt="" class="img-fluid" width="200px">
                        </center>
                    </div>
                    <!-- // col -->
                    <!-- row -->
                    <!-- <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <center>
                                <h6>Scan Barcode:</h6>
                                <img src="<?= base_url() ?>/assets/home/img/ovobarcode.jpg" alt="" class="img-fluid">
                            </center>
                        </div>
                    </div> -->
                    <!-- // row -->
                </div>
                <!-- // row -->
            </div>
            <!-- //col -->
        </div>
        <!-- // row -->
  	</section>
</main>

<script>
    function myfunct() {
        var copyText = document.getElementById("ovoid");
        copyText.select();
        copyToClipboard('#idovo');
        alert("Copied to Clipboard " + copyText.value);
    }
    function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).text()).select();
        document.execCommand("copy");
        $temp.remove();
    }
</script>