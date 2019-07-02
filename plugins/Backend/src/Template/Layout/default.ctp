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
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script>
        WebFont.load({
            google: {"families":["Montserrat:400,500,600,700","Noto+Sans:400,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
        </script>
        <!-- <style>
            .inputfile {
                width: 0.1px;
                height: 0.1px;
                opacity: 0;
                overflow: hidden;
                position: absolute;
                z-index: -1;
            }

            .inputfile + label {
                font-size: 1.25em;
                font-weight: 700;
                display: inline-block;
                cursor: pointer;
            }

            .inputfile:focus + label,
        </style> -->
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="template/img/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="template/img/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="template/img/favicon-16x16.png"><title>Klinik health care - HTML5 &#38; CSS3 Template for Clinic and Hospital</title>
        <?= $this->element('css'); ?>
        <style>
            .spinner {
                border-top: solid 5px #68c2e8;
            }
  
            .loading {
                position: fixed;
                top: 0;
                left: 0;
                width: 100vw;
                height: 100vh;
                z-index: 99999;
                background-color: rgba(255,255,255,.6);
            }
            .lds-hourglass {
                display: inline-block;
                position: absolute;
                width: 64px;
                height: 64px;
                margin-top: -32px;
                margin-left: -32px;
                top: 50%;
                left: 50%;
            }
            .lds-hourglass:after {
                content: " ";
                display: block;
                border-radius: 50%;
                width: 0;
                height: 0;
                margin: 6px;
                box-sizing: border-box;
                border: 26px solid #69c2e8;
                border-color: #69c2e8 transparent #69c2e8 transparent;
                animation: lds-hourglass 1.2s infinite;
            }
            @keyframes lds-hourglass {
                0% {
                    transform: rotate(0);
                    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
                }
                50% {
                    transform: rotate(900deg);
                    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
                }
                100% {
                    transform: rotate(1800deg);
                }
            }


        </style>
    </head>
<body>
    <?= $this->fetch('content'); ?>
    <?= $this->element('js'); ?>
</body>
</html>