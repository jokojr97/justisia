<?php $this->load->view('admin/_partial/header'); ?>
<!-- container-fluid -->
<div class="container-fluid">
  <?= $this->session->flashdata('message'); ?>
  <!-- form -->
  <form  action="<?= base_url() ?>admin/editberita" method="post" enctype="multipart/form-data">
    <!-- row -->
    <div class="row">          
      <!-- col -->
      <div class="col-md-7">
        <input type="hidden" name="id" value="<?= $id_berita ?>">
        <input type="hidden" name="id_user" value="<?= $id_user ?>">
        <input type="hidden" name="nama_user" value="<?= $nama_user ?>">
        <!-- form-group -->
        <div class="form-group mb-3">
          <label for="judul">Judul</label>
          <input type="text" name="judul" class="form-control" placeholder="Masukkan Judul Post ..."  value="<?= $berita['judul'] ?>">
          <?= form_error('judul', '<small class="text-danger">', '</small>') ?>
        </div>
        <!-- // form-group -->

        <!-- form-group -->
        <div class="form-group mb-3">
          <label for="isi">Isi</label>
          <textarea id="post_content" name="isi" class="form-control ckeditor">
          <?= $berita['deskripsi'] ?>
          </textarea>
        </div>
        <!-- // form-group -->            
      </div>
      <!-- // col -->
      <!-- col -->
      <div class="col-md-5">
        <!-- form-group -->
        <div class="form-group mb-3">
          <label for="gambar">Gambar Tumbnail</label>
          <input type="file" name="gambar" class="form-control" value="<?= set_value('gambar') ?>">
        </div>  
        <!-- // form-group -->

        <!-- form-group -->
        <div class="form-group mb-3">
          <label for="tanggal">Tanggal Upload</label>
          <input type="date" name="tanggal" class="form-control"  value="<?= $berita['date_created'] ?>">
        </div>
        <!-- // form-group -->
        
        <!-- form-group -->
        <div class="form-group mb-3">
          <label for="posttype">Jenis Post</label>
          <select name="posttype" id="posttype" class="form-control">
              <option value="<?= $berita['post_type'] ?>"><?= $berita['tipepost']['posttype_name'] ?></option>
            <?php foreach($posttypes->result() as $result) { ?>
              <option value="<?= $result->id ?>"><?= $result->posttype_name ?></option>
            <?php } ?>
          </select>
        </div>
        <!-- // form-group -->

        <!-- form-group -->
        <div class="form-group mb-3">
          <label for="jenis">Fokus Program:</label>
          <select name="programs[]" id="selectprogram" class="form-control"  multiple="multiple" style="display: none;">
            <option <?php if(str_contains($berita['programs'],"kemiskinan")){echo "selected";} ?> value="kemiskinan">Kemiskinan</option>
            <option <?php if(str_contains($berita['programs'],"pertanian")){echo "selected";} ?> value="pertanian">Pertanian</option>
            <option <?php if(str_contains($berita['programs'],"gender")){echo "selected";} ?>  value="gender">Gender</option>
            <option <?php if(str_contains($berita['programs'],"lingkungan")){echo "selected";} ?>  value="lingkungan">Lingkungan</option>
          </select>
          
        </div>       
        <!-- // form-group -->

        <!-- form-group -->
        <div class="form-group mb-3">
          <label for="tag">Tags/Keyword</label>
          <!-- row -->
          <div class="row">
            <!-- col -->
            <div class="col-10">
              <input type="text" name="tag" class="form-control" value="<?= set_value('kategori') ?>" id="tag" placeholder="masukkan Keyword">
            </div>
            <!-- // col -->
            <!-- col -->
            <div class="col-2">
              <button id="btnAdd" class=" btn-block btn btn-primary">Add</button>
            </div>
            <!-- // col -->
          </div>
          <!-- // row -->

          <!-- form-group -->
          <div class="form-group">  
            <label for="list" style="font-weight:normal">Keywords List:</label>
            <select id="list" name="list" class="form-control" multiple>
              <?php foreach($berita['tags'] as $result) { ?>
                <option><?= $result['name'] ?></option>
              <?php } ?>
            </select>
            <div id="hid">
              <?php foreach($berita['tags'] as $result) { ?>
                <input type="hidden" name="tags[]" value="<?= $result['name'] ?>" id="<?= $result['id'] ?>">
              <?php } ?>
            </div>
            <button class="btn btn-block btn-danger mt-2" id="btnRemove">Remove Selected Keywords</button>
          </div>
          <!-- // form-group -->
        </div>              
        <!-- // form-group -->

        <!-- form-group -->
        <div class="form-group mb-3">
          <label for="sumber">Sumber</label>
          <input type="text" name="sumber" class="form-control" value="<?= $berita['sumber_foto'] ?>" placeholder="masukkan sumber foto">
        </div>         
        <!-- // form-group     -->

        <button type="submit" class="btn btn-danger float-right ml-3"><i class="fas fa-upload"></i>&nbsp;&nbsp;Publish</button>
        <a href="<?= base_url() ?>admin/berita" class="text-bold btn btn-default float-right"><i class="fa fa-close"></i>&nbsp;&nbsp;Cancel</a>
        <!-- </div> -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </form>
  <!-- // form -->
</div><!--/. container-fluid -->
<?php $this->load->view('admin/_partial/footer') ?>

<script>
  // WYSIWIG
  CKEDITOR.replace('post_content', {
      filebrowserBrowseUrl: '<?= base_url('assets/js/kcfinder/browse.php') ?>',
      height: '600px',
      
      allowedContent: {
        script: true,
        div: true,
        $1: {
          // This will set the default set of elements
          elements: CKEDITOR.dtd,
          attributes: true,
          styles: true,
          classes: true
        }
      }
  });
    
  // keyword jquery
  const btnAdd = document.querySelector('#btnAdd');
  const btnRemove = document.querySelector('#btnRemove');
  const sb = document.querySelector('#list');
  const name = document.querySelector('#tag');
  const hid = document.querySelector('#hid');
  var i = 2;

  btnAdd.onclick = (e) => {
      e.preventDefault();

      // validate the option
      if (name.value == '') {
          alert('Please enter the name.');
          return;
      }
      // create a new option
      const option = new Option(name.value, name.value);
      // add it to the list
      sb.add(option, undefined);

      var x = document.createElement("INPUT");
      x.setAttribute("type", "hidden");
      x.setAttribute("name", "tags[]");
      x.setAttribute("value", name.value);
      trimname = name.value;
      trimname = trimname.replaceAll(' ', '');
      trimname = trimname.replaceAll('-', '');
      trimname = trimname.replaceAll(',', '');
      trimname = trimname.replaceAll(';', '');
      trimname = trimname.replaceAll('.', '');
      trimname = trimname.replaceAll('?', '');
      x.setAttribute("id", trimname);
      hid.appendChild(x);
      i++;
      
      // reset the value of the input
      name.value = '';
      name.focus();
  };

  // remove selected option
  btnRemove.onclick = (e) => {
      e.preventDefault();
      
      // save the selected option
      let selected = [];

      for (let i = 0; i < sb.options.length; i++) {
        selected[i] = sb.options[i].selected;
      }

      // remove all selected option
      let index = sb.options.length;
      while (index--) {
        if (selected[index]) {
          trimname = sb.options[index].value;
          trimname = trimname.replaceAll(' ', '');
          trimname = trimname.replaceAll('-', '');
          trimname = trimname.replaceAll(',', '');
          trimname = trimname.replaceAll(';', '');
          trimname = trimname.replaceAll('.', '');
          trimname = trimname.replaceAll('?', '');

          const tagdihapus = document.getElementById(trimname);
          tagdihapus.remove();
          console.log(trimname);
          sb.remove(index);
        }        
      }
  };

  // REPLACE KATEGORI
  function catfunction(category){
    const Kategori = document.querySelector('#kategoriinput');
    Kategori.value = category.value;
  }
</script>

<!-- For Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugin/dist/js/BsMultiSelect.bs4.min.js"></script>
<script>
  $(function(){
    $("#selectprogram").bsMultiSelect();
    });
</script>
