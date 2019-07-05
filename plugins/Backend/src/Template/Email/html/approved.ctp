<?php 
use Cake\Routing\Router; 
use Cake\Log\Log;
?>
<!DOCTYPE html>
<!--
Item Name: Elisyam - Web App & Admin Dashboard Template
Version: 1.5
Author: SAEROX

** A license must be purchased in order to legally use this template for your project **
-->
<html lang="en">
<head>
<title>Elisyam | Welcome Email</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<style type="text/css">
    @import url('https://fonts.googleapis.com/css?family=Montserrat|Noto+Sans');
    /* CLIENT-SPECIFIC STYLES */
    #outlook a{padding:0;} /* Force Outlook to provide a "view in browser" message */
    .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail to display emails at full width */
    .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;} /* Force Hotmail to display normal line spacing */
    body, table, td, a{-webkit-text-size-adjust:100%; -ms-text-size-adjust:100%;} /* Prevent WebKit and Windows mobile changing default text sizes */
    table, td{mso-table-lspace:0pt; mso-table-rspace:0pt;} /* Remove spacing between tables in Outlook 2007 and up */
    img{-ms-interpolation-mode:bicubic;} /* Allow smoother rendering of resized image in Internet Explorer */
    body{margin:0; padding:0;}
    img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none;}
    table{border-collapse:collapse !important;}
    body{height:100% !important; margin:0; padding:0; width:100% !important;}
    * {
        -ms-text-size-adjust:100%;
        -webkit-text-size-adjust:none;
        -webkit-text-resize:100%;
        text-resize:100%;
    }

    /* iOS BLUE LINKS */
    .appleBody a {color:#68440a; text-decoration: none;}
    .appleFooter a {color:#999999; text-decoration: none;}

    /* MOBILE STYLES */
    @media screen and (max-width: 525px) {

        /* ALLOWS FOR FLUID TABLES */
        table[class="wrapper"]{
          width:100% !important;
        }

        /* ADJUSTS LAYOUT OF LOGO IMAGE */
        td[class="logo"]{
          text-align: left;
          padding: 0 !important;
        }

        td[class="logo"] img{
          margin:0 auto!important;
          padding: 30px 0 !important;
        }

        /* USE THESE CLASSES TO HIDE CONTENT ON MOBILE */
        td[class="mobile-hide"]{
          display:none;}

        img[class="mobile-hide"]{
          display: none !important;
        }

        img[class="img-max"]{
          max-width: 100% !important;
          height:auto !important;
        }

        /* FULL-WIDTH TABLES */
        table[class="responsive-table"]{
          width:100%!important;
        }

        /* UTILITY CLASSES FOR ADJUSTING PADDING ON MOBILE */

        td[class="padding-copy"]{
          text-align: center;
        }

        td[class="padding-meta"]{
          text-align: center;
        }

        td[class="no-pad"]{
          padding: 0 0 20px 0 !important;
        }

        td[class="no-padding"]{
          padding: 0 !important;
        }

        /* ADJUST BUTTONS ON MOBILE */
        td[class="mobile-wrapper"]{
            padding: 10px 5% 15px 5% !important;
        }

        table[class="mobile-button-container"]{
            margin:0 auto;
            width:100% !important;
        }

        a[class="mobile-button"]{
            width:80% !important;
            padding: 15px !important;
            border: 0 !important;
            font-size: 16px !important;
        }

    }
</style>
</head>
<body style="margin: 0; padding: 0;">
    <!-- Begin Copy -->
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;">
        <tr>
            <td bgcolor="#1e2035" align="center">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tr>
                        <td style="padding-top: 30px;">
                            <!-- UNSUBSCRIBE COPY -->
                            <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" class="responsive-table">
                                <tr>
                                    <td align="center" valign="middle" style="font-size: 12px; line-height: 24px; font-family: Noto Sans, Arial, sans-serif; color:#aea9c3; padding-bottom: 35px;">
                                        <a style="color: #aea9c3; text-decoration: none;" href="#">View this email in your browser</a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <!-- End Copy -->
    <!-- Begin Section -->
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;">
        <tr>
            <td bgcolor="#1e2035" align="center" style="padding: 0 15px 0 15px;" class="section-padding">
                <table border="0" cellpadding="0" cellspacing="0" width="600" class="responsive-table">
                    <tr>
                        <td>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td>
                                        <!-- Begin Hero Image -->
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tbody>
                                                <tr>
                                                    <td class="padding-copy">
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td>
                                                                    <a href="#" target="_blank">
                                                                        <img src="http://otifvpp.vn/datas/thaickc/01.jpg" width="600" height="385" border="0" alt="..." style="display: block; padding: 0; color: #666666; text-decoration: none; font-family: Helvetica, arial, sans-serif; font-size: 16px; width: 600px; height: 385px;" class="img-max">
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!-- End Hero Image -->
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <!-- Begin Content -->
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
                                            <tr>
                                                <td align="center" style="font-size: 35px; font-family: Montserrat, Arial, sans-serif; color: #2c304d; padding-top: 30px;" class="padding-copy">Chúc mừng!</td>
                                            </tr>
                                            <tr>
                                                <td align="center" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Noto Sans, Arial, sans-serif; color: #aea9c3;" class="padding-copy">Cảm ơn bạn đã gửi yêu cầu đăng bài viết.<br>Bài viết của bạn hiện đã được duyệt bởi quản trị viên!</td>
                                            </tr>
                                        </table>
                                        <!-- End Content -->
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <!-- Begin Button -->
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="mobile-button-container" bgcolor="#ffffff">
                                            <tr>
                                                <td align="center" style="padding: 25px 0 0 0;" class="padding-copy">
                                                    <table border="0" cellspacing="0" cellpadding="0" class="responsive-table">
                                                        <tr>
                                                            <td align="center"><a href="<?= 'localhost/tech-e/articles/details/'.$data['id'] ?>" target="_blank" style="font-size: 16px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #ffffff; text-decoration: none; background-color: #5d5386; border-top: 15px solid #5d5386; border-bottom: 15px solid #5d5386; border-left: 35px solid #5d5386; border-right: 35px solid #5d5386; border-radius: 35px; -webkit-border-radius: 35px; -moz-border-radius: 35px; display: inline-block;" class="mobile-button">Xem bài viết</a></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                        <!-- End Button -->
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <!-- Begin Content -->
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
                                            <tr>
                                                <td align="center" style="padding: 20px 0 60px 0; font-size: 16px; line-height: 25px; font-family: Noto Sans, Arial, sans-serif; color: #aea9c3;" class="padding-copy">Thanks!<br>Tech-Entrance Team</td>
                                            </tr>
                                        </table>
                                        <!-- End Content -->
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <!-- End Section -->
    <!-- Begin Help Section -->
    <!-- Begin Social -->
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;">
        <tr>
            <td bgcolor="#1e2035" align="center">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tr>
                        <td style="padding: 0 15px 0 15px;">
                            <!-- UNSUBSCRIBE COPY -->
                            <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" class="responsive-table">
                                <tr>
                                    <td align="center" valign="middle" style="font-size: 12px; line-height: 24px; font-family: Noto Sans, Arial, sans-serif; color:#aea9c3; padding-bottom: 35px;" bgcolor="#ffffff">
                                        <a href="#">
                                            <img src="http://otifvpp.vn/datas/thaickc/ico-twitter.png" alt="..." width="40" height="40" style="display: inline-block;" border="0">
                                        </a>
                                        <span class="original-only" style="font-family: Arial, sans-serif; font-size: 12px; color: #444444;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                        <a href="https://www.facebook.com/tranphuong.thai.50">
                                            <img src="http://otifvpp.vn/datas/thaickc/ico-facebook.png" alt="..." width="40" height="40" style="display: inline-block;" border="0">
                                        </a>
                                        <span class="original-only" style="font-family: Arial, sans-serif; font-size: 12px; color: #444444;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <!-- End Social -->
    <!-- Begin Footer -->
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;">
        <tr>
            <td bgcolor="#1e2035" align="center">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tr>
                        <td style="padding: 0 15px 0 15px;">
                            <!-- UNSUBSCRIBE COPY -->
                            <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" class="responsive-table">
                                <tr>
                                    <td align="center" valign="middle" style="font-size: 12px; line-height: 24px; font-family: Noto Sans, Arial, sans-serif; color:#aea9c3; padding-bottom: 35px; border-radius: 0 0 4px 4px;" bgcolor="#ffffff">
                                        <span class="appleFooter" style="color:#aea9c3;">360c Bến Vân Đồn, Phường 1, Quận 4, Hồ Chí Minh, Việt Nam</span><br><a class="original-only" style="color: #5d5386; text-decoration: underline;" href="#"></a><span class="original-only" style="font-family: Arial, sans-serif; font-size: 12px; color: #444444;">&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</span><a class="original-only" style="color: #5d5386; text-decoration: underline;" href="#"></a><span class="original-only" style="font-family: Arial, sans-serif; font-size: 12px; color: #444444;">&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</span><a class="original-only" style="color: #5d5386; text-decoration: underline;" href="db-default.html"></a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <!-- End Footer -->
    <!-- Begin Copy -->
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;">
        <tr>
            <td bgcolor="#1e2035" align="center">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tr>
                        <td style="padding-top: 30px;">
                            <!-- UNSUBSCRIBE COPY -->
                            <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" class="responsive-table">
                                <tr>
                                    <td align="center" valign="middle" style="font-size: 12px; line-height: 24px; font-family: Noto Sans, Arial, sans-serif; color:#aea9c3; padding-bottom: 35px;">
                                        <span class="appleFooter" style="color:#aea9c3;">Tech Entrance, 2019. All Rights Reserved</span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <!-- End Copy -->
</body>
</html>