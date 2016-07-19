<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- SDIL Admin Dashboard CSS -->
    <link href="<?php echo base_url(); ?>css/sdil-admin.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/morris.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url(); ?>css/metisMenu.min.css" rel="stylesheet">


    <link href="<?php echo base_url(); ?>css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>css/bootstrap.icon-large.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <link href="<?php echo base_url(); ?>css/jquery.dataTables.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>css/bootstrap-datepicker.css" rel="stylesheet" type="text/css">

    <script src="<?php echo base_url();?>tinymce/tinymce.min.js"></script>
    <!--<script type="text/javascript">
        tinymce.init({
            selector: "textarea",
            width:800,
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste jbimages"
            ],
            toolbar: "insertfile undo redo | styleselect | sizeselect bold italic fontsizeselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
            relative_urls: false,
            fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
            autosave_ask_before_unload: false,
            setup: function (editor) {
                editor.on('change', function () {
                    editor.save();
                });
            }
        });
    </script>-->
</head>
