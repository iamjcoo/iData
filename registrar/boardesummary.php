<?php
require_once("../PHPconnect/phpC.php");
if(!isset($_SESSION['idataregistrar'])){
    header('Location: ../sign-in.php');
}else{
    $npfttsuc = 0;
    $fttsuc = 0;
    $tnpirsuc = 0;
    $tntirsuc = 0;
    $npfttnatl = 0;
    $fttnatl = 0;
    $tnpirnatl = 0;
    $tntirnatl = 0;
    $tnpfttsuc = 0;
    $tttsuc = 0;
    $ttnpirsuc = 0;
    $ttntirsuc = 0;
    $tnpfttnatl = 0;
    $tttnatl = 0;
    $ttnpirnatl = 0;
    $ttntirnatl = 0;
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

<body class="theme-blue">
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
                                BOARD EXAM
                            </h2>
                            <?php 
                                $pid = $_GET['period']; 
                                $sql = mysqli_query($link, "SELECT * FROM dyear WHERE id ='$pid'");
                                $res = mysqli_fetch_assoc($sql);
                                $period = $res['year']; ?>
                            <small>Edit or Delete Data on Board Exan for <?php echo $period; ?></small>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable jquery-datatable js-exportable dt-responsive display nowrap" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>PROGRAM NAME</th>
                                        <th>Date of Examination</th>
                                        <th>No. of Passers - 1st Time Takers (SUC)</th>
                                        <th>1st Time Takers (SUC)</th>
                                        <th>Total No. of Passers incl. Retakers (SUC)</th>
                                        <th>Total No. of Takers incl. Retakers (SUC)</th>
                                        <th>No. of Passers - 1st Time Takers (Nat'l)</th>
                                        <th>1st Time Takers (Nat'l)</th>
                                        <th>Total No. of Passers incl. Retakers (Nat'l)</th>
                                        <th>Total No. of Takers incl. Retakers (Nat'l)</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
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
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                    </tr>
                                    <?php
                                            $did = $r['id'];
                                            $qu = mysqli_query($link, "SELECT * FROM board_exam WHERE delivery_unit = '$did' AND year ='$period'");
                                            while($re = mysqli_fetch_array($qu)){
                                            ?>
                                            <tr>
                                                <td><?php echo $re['pn']; ?></td>
                                                <td><?php echo $re['exam_month']. ' '. $re['year']; ?> </td>
                                                <td><?php echo $re['nop1ttsuc']; ?></td>
                                                <td><?php echo $re['1ttsuc']; ?></td>
                                                <td><?php echo $re['tnpirsuc']; ?></td>
                                                <td><?php echo $re['tntirsuc']; ?></td>
                                                <td><?php echo $re['npfttnatl']; ?></td>
                                                <td><?php echo $re['1ttnatl']; ?></td>
                                                <td><?php echo $re['tnpirnatl']; ?></td>
                                                <td><?php echo $re['tntirnatl']; ?></td>
                                            </tr>
                                            <?php
                                                $npfttsuc = $npfttsuc + $re['nop1ttsuc'];
                                                $fttsuc = $fttsuc + $re['1ttsuc'];
                                                $tnpirsuc = $tnpirsuc + $re['tnpirsuc'];
                                                $tntirsuc = $tntirsuc + $re['tntirsuc'];
                                                $npfttnatl = $npfttnatl + $re['npfttnatl'];
                                                $fttnatl = $fttnatl + $re['1ttnatl'];
                                                $tnpirnatl = $tnpirnatl + $re['tnpirnatl'];
                                                $tntirnatl = $tntirnatl + $re['tntirnatl'];
                                            }
                                    ?>
                                    <tr>
                                        <th style="text-align: right;">SUBTOTAL (<?php echo $r['acronym']; ?>)</th>
                                        <th> </th>
                                        <th><?php echo $npfttsuc; ?></th>
                                        <th><?php echo $fttsuc; ?></th>
                                        <th><?php echo $tnpirsuc; ?></th>
                                        <th><?php echo $tntirsuc; ?></th>
                                        <th><?php echo $npfttnatl; ?></th>
                                        <th><?php echo $fttnatl; ?></th>
                                        <th><?php echo $tnpirnatl; ?></th>
                                        <th><?php echo $tntirnatl; ?></th>
                                    </tr>
                                    <tr>
                                        <th style="text-align: right;">(<?php echo $r['acronym']; ?>) First Time Takers Percentage: </th>
                                        <th><?php @$fttp = (($fttsuc/$npfttsuc)/($fttnatl/$npfttnatl)*100); echo round($fttp, 2, PHP_ROUND_HALF_UP); ?></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th style="text-align: right;">(<?php echo $r['acronym']; ?>) Over All Takers Percentage: </th>
                                        <th><?php @$oatp = (($tntirsuc/$tnpirsuc)/($tntirnatl/$tnpirnatl)*100); echo round($oatp, 2, PHP_ROUND_HALF_UP); ?></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    <?php
                                        $tnpfttsuc = $tnpfttsuc + $npfttsuc;
                                        $tttsuc = $tttsuc + $fttsuc;
                                        $ttnpirsuc = $ttnpirsuc + $tnpirsuc;
                                        $ttntirsuc = $ttntirsuc + $tntirsuc;
                                        $tnpfttnatl = $tnpfttnatl + $npfttnatl;
                                        $tttnatl = $tttnatl + $fttnatl;
                                        $ttnpirnatl = $ttnpirnatl + $tnpirnatl;
                                        $ttntirnatl = $ttntirnatl + $tntirnatl;

                                        $npfttsuc = 0;
                                        $fttsuc = 0;
                                        $tnpirsuc = 0;
                                        $tntirsuc = 0;
                                        $npfttnatl = 0;
                                        $fttnatl = 0;
                                        $tnpirnatl = 0;
                                        $tntirnatl = 0;


                                        }
                                    ?>
                                    <tr>
                                        <th style="text-align: right;">GRAND TOTAL</th>
                                        <th> </th>
                                        <th><?php echo $tnpfttsuc; ?></th>
                                        <th><?php echo $tttsuc; ?></th>
                                        <th><?php echo $ttnpirsuc; ?></th>
                                        <th><?php echo $ttntirsuc; ?></th>
                                        <th><?php echo $tnpfttnatl; ?></th>
                                        <th><?php echo $tttnatl; ?></th>
                                        <th><?php echo $ttnpirnatl; ?></th>
                                        <th><?php echo $ttntirnatl; ?></th>
                                    </tr>
                                    <tr>
                                        <th style="text-align: right;">(Over All) First Time Takers Percentage: </th>
                                        <th><?php @$tfttp = (($tttsuc/$tnpfttsuc)/($tttnatl/$tnpfttnatl)*100); echo round($tfttp, 2, PHP_ROUND_HALF_UP); ?></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th style="text-align: right;">(Over All) First Time Takers Percentage: </th>
                                        <th><?php @$toatp = (($ttntirsuc/$ttnpirsuc)/($ttntirnatl/$ttnpirnatl)*100); echo round($toatp, 2, PHP_ROUND_HALF_UP); ?></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
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
    <script src="../extra/plugins/jquery-datatable/responsive.datatables.js"></script>
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
    $(".delete").click(function() {
        var data = $(this).val();
            if (confirm("Do you really want to delete this program data?"))
            {
                var row = $(this).parents('tr');

                $.post("boarddel.php", {
                data: data,
                }, function(data) {
                $.notify({
                    // options
                    message: 'Successfully Deleted!' 
                    },{
                        // settings
                        type: 'success'
                    });
                });
                row.slideUp('slow', function() {$(row).remove();});
                document.reload();
            }
            return false;
        });
</script>
</body>

</html>
