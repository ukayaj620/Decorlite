<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $title; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link href="<?php echo base_url('css/sb-admin-2.css'); ?>" rel="stylesheet">
</head>

<body>

<!-- Page Wrapper -->
<div id="wrapper">
    <?php $this->load->view('admin/sidebar'); ?>
    <div id="content-wrapper" class="d-flex flex-column">
        <div class="container-fluid mt-4">
            <div id="content">
                <?php echo form_open_multipart("admin/tabel/submit_insert/".$table_name); ?>
                    <?php foreach($fields as $f){ ?>
                        <?php if ($f == "ImagePath") { ?>
                            <label for="photo">Upload Image</label><br>
                            <input type="file" id="photo" name="photo" accept="image/*">
                        <?php } else { ?>
                            <label for=""><?php echo $f ?></label><br>
                            <input type="text" id="" name="data[]" value="">
                        <?php } ?>
                        <br />
                    <?php } ?>
                    <br />
                    <button type="submit" class="">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>

</html>