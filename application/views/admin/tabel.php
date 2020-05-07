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
                <h1>Tabel <?php echo $table_name; ?></h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <?php foreach ($fields as $f){?>
                            <td>
                                <?php echo $f; ?>
                            </td>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($isi as $row) {?>
                        <tr>
                            <?php foreach ($row as $col){?>
                            <td>
                                <?php echo $col; ?>
                            </td>
                            <?php } ?>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</body>

</html>