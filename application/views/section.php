<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?= base_url() ?>assets/tinymce/skin.min.css">

  <script src="<?= base_url() ?>assets/tinymce/modern/theme.js" referrerpolicy="origin"></script>
  <script src="<?= base_url() ?>assets/tinymce/modern/theme.min.js" referrerpolicy="origin"></script>


  <script src="<?= base_url() ?>assets/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
   <script src="<?= base_url() ?>assets/tinymce/ar.js" referrerpolicy="origin"></script>

 
  <script>
  
  //tinymce.init({selector:'textarea'});
  tinymce.init({
  selector: 'textarea',  // change this value according to your HTML
  language: 'ar'
});

  
  </script>

  </head>

  <body>
  <h1>TinyMCE Quick Start Guide</h1>
    <form method="post">
      <textarea id="mytextarea">Hello, World!</textarea>
    </form>
  </body>
</html>