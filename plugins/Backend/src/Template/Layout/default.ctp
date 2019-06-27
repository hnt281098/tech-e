<!DOCTYPE html>
<html>
    <head>
        <?php use Cake\Routing\Router; ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Tech-E Magazine</title>
        <meta name="description" content="Elisyam is a Web App and Admin Dashboard Template built with Bootstrap 4">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Google Fonts -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
        <script>
        WebFont.load({
            google: {"families":["Montserrat:400,500,600,700","Noto+Sans:400,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
        </script>
        <style>
            .inputfile {
                width: 0.1px;
                height: 0.1px;
                opacity: 0;
                overflow: hidden;
                position: absolute;
                z-index: -1;
            }

            /*.inputfile + label {
                font-size: 1.25em;
                font-weight: 700;
                display: inline-block;
                cursor: pointer;
            }

            .inputfile:focus + label,*/
        </style>
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="template/img/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="template/img/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="template/img/favicon-16x16.png"><title>Klinik health care - HTML5 &#38; CSS3 Template for Clinic and Hospital</title>
        <?= $this->element('css'); ?>
    </head>
<body>
    <?= $this->fetch('content'); ?>
    <?= $this->element('js'); ?>
</body>
</html>