
   <main id="main" class="main-page  ">

<!--==========================
  Speaker Details Section
============================-->
<section id="speakers-details" class="wow fadeIn">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <h3>Post Not Found</h3>
        <hr>
      </div>
      <div class="col-md-4">
        <?php          
          $data['berita_list'] = $berita_list;
          $data['category_list'] = $category_list;
        ?>
        <?php $this->load->view('home/_partial/sidebar', $data) ?>
      </div>
    </div>
    
  </div>

</section>

</main>

