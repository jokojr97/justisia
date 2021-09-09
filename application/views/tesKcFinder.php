<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ckeditor4/ckeditor.js"></script>

<textarea class="body" id="post" name="editor"></textarea>

<script>
    CKEDITOR.replace('post', {
        filebrowserBrowseUrl: '<?= base_url('assets/js/kcfinder/browse.php') ?>',
        height: '500px'
    });
</script>
