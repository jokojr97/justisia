<!DOCTYPE html>
<html>
<head>
  <script type="text/javascript" src="<?= base_url() ?>assets/tinymce/tinymce.min.js"></script>

</head>
<body>
  <textarea rows="25" id="post_content" name="post_content" class="form-control ckeditor"></textarea>
<script type="text/javascript">
    tinymce.init({
        selector: "#post_content",
        plugins: [
             "advlist autolink lists link image charmap print preview hr anchor pagebreak",
             "searchreplace wordcount visualblocks visualchars code fullscreen",
             "insertdatetime nonbreaking save table contextmenu directionality",
             "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image responsivefilemanager",
        automatic_uploads: true,
        image_advtab: true,
        images_upload_url: "<?php echo base_url("CONTROLLER_UPLOAD")?>",
        file_picker_types: 'image', 
        paste_data_images:true,
        relative_urls: false,
        remove_script_host: false,
          file_picker_callback: function(cb, value, meta) {
             var input = document.createElement('input');
             input.setAttribute('type', 'file');
             input.setAttribute('accept', 'image/*');
             input.onchange = function() {
                var file = this.files[0];
                var reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function () {
                   var id = 'post-image-' + (new Date()).getTime();
                   var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                   var blobInfo = blobCache.create(id, file, reader.result);
                   blobCache.add(blobInfo);
                   cb(blobInfo.blobUri(), { title: file.name });
                };
             };
             input.click();
          }
   });
</script>
 
</body>
</html>
