<!DOCTYPE html>

<html lang="es">

<head>
    <title><?= $this->renderSection('Title'); ?></title>
    <meta charset="utf-8">
    <meta name="description" content="Inventarios">
    <!-- Twitter meta-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#009688">
    <!-- Main CSS-->
    <link href="/favicon.ico" rel="shortcut icon">
    <link href="https://framework-gb.cdn.gob.mx/gm/v4/image/favicon.ico" rel="shortcut icon">
    <link href="https://framework-gb.cdn.gob.mx/gm/v4/css/main.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assets/css/select2.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/dynamics.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>assets/css/datatables.min.css" rel="stylesheet" />
    <script src="<?= base_url(); ?>assets/js/datatables.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/plugins/buttons.print.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        const base_url = "<?= base_url(); ?>"
    </script>

    <?= $this->renderSection('HeadContent'); ?>
</head>
<body>
    <main class="app-content">
        <?= $this->include('Master/menu/menu'); ?>
        <?= $this->renderSection('MainContent'); ?>
    </main>
    <div id="cuerpo-content"></div>

    <!-- The javascript plugin to display page loading on top-->
    <script src="<?= base_url(); ?>/assets/js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="<?= base_url(); ?>/assets/js/plugins/sweetalert.min.js"></script>
    <!--data table plugin-->
    <script type="text/javascript" ssrc="<?= base_url(); ?>assets/js/plugins/dataTables.spanish.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/select2.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/dynamics-1.00.0.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/js/functions_generales.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://framework-gb.cdn.gob.mx/gm/v4/js/gobmx.js"></script>
    <?= $this->renderSection('FooterContent'); ?>

</body>

</html>