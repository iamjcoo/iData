<?php
require_once("../PHPconnect/phpC.php");
if(!isset($_SESSION['idataregistrar'])){
    header('Location: ../sign-in.php');
}else{
    $thc = 0;
    $teu = 0;
    $tweu = 0;
    $tfte = 0;
    $uhc = 0;
    $ueu = 0;
    $uweu = 0;
    $ufte = 0;
    $vhc = 0;
    $veu = 0;
    $vweu = 0;
    $vfte = 0;
}
if(isset($_GET['logout'])){
    session_unset();
    header('Location: ../sign-in.php');
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>iData :: CSPC Databanking System</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="../extra/css/icon.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../extra/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../extra/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../extra/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="../extra/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="../extra/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../extra/css/themes/all-themes.css" rel="stylesheet" />
    <script language="JavaScript">

        document.onkeypress = function (event) {
            event = (event || window.event);
            if (event.keyCode == 123) {
            return false;
            }
        }
         document.onmousedown = function (event) {
            event = (event || window.event);
            if (event.keyCode == 123) {
            return false;
            }
        }
        document.onkeydown = function (event) {
            event = (event || window.event);
            if (event.keyCode == 123) {
                //alert('No F-keys');
                return false;
            }
        }
    </script>
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <?php require_once('header.php'); ?>

    <?php require_once('sidebar.php'); ?>
    <section class="content">
        <div class="container-fluid">
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                SUMMARY OF ENROLMENT
                            </h2>
                            <?php
                                $period = $_GET['period'];
                                $query = mysqli_query($link, "SELECT * FROM period WHERE id = '$period'");
                                $res = mysqli_fetch_assoc($query);
                            ?></h2>
                            <small><?php echo $res['semester']; ?> Semester, School Year <?php echo $res['sy']; ?></small>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable" >
                                <thead>
                                    <tr>
                                        <th>PROGRAM NAME</th>
                                        <th>Head Count</th>
                                        <th>Total Enrolled Units</th>
                                        <th>OPIF/NF weights</th>
                                        <th>Weighted Enrolled Units</th>
                                        <th>Full Time Equivalent</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <tr>
                                        <th>GRADUATES PROGRAM</th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                    </tr>
                                    <?php
                                        $period = $_GET['period'];
                                        $query = mysqli_query($link, "SELECT * FROM enrolment WHERE prog_sort = 'Graduate' AND period ='$period'");
                                        while($res=mysqli_fetch_array($query)){
                                    ?>
                                    <tr>
                                        <td><?php echo $res['pn']; ?></td>
                                        <td><?php $thc = $thc + $res['head_count']; echo $res['head_count']; ?></td>
                                        <td><?php $teu = $teu + $res['total_enr_units']; echo $res['total_enr_units']; ?></td>
                                        <td><?php echo $res['weights']; ?></td>
                                        <td><?php echo $weu = $res['total_enr_units'] * $res['weights']; $tweu = $tweu + $weu; ?></td>
                                        <td><?php $fte = $weu / 18; echo $fte = round($fte, 2, PHP_ROUND_HALF_UP); $tfte = $tfte + $fte; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <tr>
                                        <th>TOTAL (GRADUATES PROGRAM)</th>
                                        <th><?php echo $thc; ?></th>
                                        <th><?php echo $teu; ?></th>
                                        <th> </th>
                                        <th><?php echo $tweu; ?></th>
                                        <th><?php echo $tfte; ?></th>
                                    </tr>
                                    <tr>
                                        <th>UNDERGRADUATES PROGRAM</th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                    </tr>
                                    <?php
                                        $q = mysqli_query($link, "SELECT * FROM delivery_units");
                                        while($r = mysqli_fetch_array($q)){
                                    ?>
                                    <tr>
                                        <th><?php echo $r['name']; ?> (<?php echo $r['acronym']; ?>)</th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                    </tr>
                                    <?php
                                            $did = $r['id'];
                                            $qu = mysqli_query($link, "SELECT * FROM enrolment WHERE delivery_unit = '$did' AND prog_sort ='Undergraduate' AND period ='$period'");
                                            while($re = mysqli_fetch_array($qu)){
                                            ?>
                                            <tr>
                                                <td><?php echo $re['pn']; ?></td>
                                                <td><?php $uhc = $uhc + $re['head_count']; $vhc = $vhc + $re['head_count']; echo $re['head_count']; ?></td>
                                                <td><?php $ueu = $ueu + $re['total_enr_units']; $veu = $veu + $re['total_enr_units']; echo $re['total_enr_units']; ?></td>
                                                <td><?php echo $re['weights']; ?></td>
                                                <td><?php echo $weu = $re['total_enr_units'] * $re['weights']; $uweu = $uweu + $weu; $vweu = $vweu + $weu; ?></td>
                                                <td><?php $fte = $weu / 18; echo $fte = round($fte, 2, PHP_ROUND_HALF_UP); $ufte = $ufte + $fte; $vfte = $vfte + $fte;?></td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                    <tr>
                                        <th>TOTAL (<?php echo $r['acronym']; ?>)</th>
                                        <th><?php echo $uhc; ?></th>
                                        <th><?php echo $ueu; ?></th>
                                        <th> </th>
                                        <th><?php echo $uweu; ?></th>
                                        <th><?php echo $ufte; ?></th>
                                        <?php $uhc=0; $ueu=0; $uweu=0; $ufte=0;?>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                    <tr>
                                        <th>TOTAL (UNDERGRADUATES PROGRAM)</th>
                                        <th><?php echo $vhc; ?></th>
                                        <th><?php echo $veu; ?></th>
                                        <th> </th>
                                        <th><?php echo $vweu; ?></th>
                                        <th><?php echo $vfte; ?></th>
                                    </tr>
                                    <tr>
                                        <th>GRAND TOTAL</th>
                                        <th><?php echo $vhc + $thc; ?></th>
                                        <th><?php echo $veu + $teu; ?></th>
                                        <th> </th>
                                        <th><?php echo $vweu + $tweu; ?></th>
                                        <th><?php echo $vfte + $tfte; ?></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
            
        </div>

    </section>

    <!-- Jquery Core Js -->
    <script src="../extra/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../extra/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../extra/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../extra/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../extra/plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="../extra/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../extra/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../extra/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../extra/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../extra/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../extra/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../extra/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../extra/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../extra/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="../extra/js/admin.js"></script>
    <script src="../extra/js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="../extra/js/demo.js"></script>
    <script>
    $(document).ready(function()
{ 
       $(document).bind("contextmenu",function(e){
              return false;
       }); 
       
       
});

</script>
</body>

</html>
