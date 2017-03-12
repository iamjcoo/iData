<?php
require_once("../PHPconnect/phpC.php");
if(!isset($_SESSION['idataextension'])){
    header('Location: ../sign-in.php');
}else{
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
                                DATA ON EXTENSION
                            </h2>
                            <?php 
                            $period = $_GET['period'];
                            $eperiod = $_GET['period']. "-12-31";
                            $speriod = $_GET['period']. "-01-01"; 
                            ?>
                            <small>Edit or Delete Data on Extension for <?php echo $period; ?></small>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable jquery-datatable dt-responsive display nowrap" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>Title of Project</th>
                                        <th>Date</th>
                                        <th>No. of persons trained / served </th>
                                        <th>Total No. of hours</th>
                                        <th>No. of days</th>
                                        <th>Weights</th>
                                        <th>No. of persons trained / served weighted by length of training</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php
                                        $q = mysqli_query($link, "SELECT * FROM delivery_units");
                                        while($r = mysqli_fetch_array($q)){
                                    ?>
                                    <tr>
                                        <th> </th>
                                        <th><?php echo $r['name']; ?> (<?php echo $r['acronym']; ?>)</th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                    </tr>
                                    <?php
                                            $did = $r['id'];
                                            $qu = mysqli_query($link, "SELECT * FROM extension WHERE (delivery_unit = '$did') AND (edate <= '$eperiod' AND edate >= '$speriod') AND (sdate <= '$eperiod' AND sdate >= '$speriod') ");
                                            while($re = mysqli_fetch_array($qu)){
                                            ?>
                                            <tr>
                                                <th><a href="extedit.php?id=<?php echo $re['id']; ?>"><button type="button"  class="btn bg-teal btn-sm waves-effect"><i class="material-icons">create</i></button></a>&nbsp;<button type="button" value="<?php echo $re['id']; ?>"" class="delete btn bg-red btn-sm waves-effect"><i class="material-icons">delete</i></button> </th>
                                                <td><?php echo $re['title']; ?></td>
                                                <td><?php $sdate = date_create($re['sdate']); $edate = date_create($re['edate']); echo date_format($sdate, "F d, Y") . ' - '. date_format($edate, "F d, Y"); ?> </td>
                                                <td><?php echo $re['npt']; ?></td>
                                                <td><?php echo $re['tnh']; ?></td>
                                                <td><?php echo $days = $re['tnh']/8; ?></td>
                                                <td><?php 
                                                    if($re['tnh'] < 8){
                                                        $weights = .50;

                                                    }else if($re['tnh'] == 8){
                                                        $weights = 1;
                                                        
                                                    }else if($re['tnh'] == 16){
                                                        $weights = 1.25;
                                                        
                                                    }else if($re['tnh'] >= 24 && $re['tnh'] <= 32){
                                                        $weights = 1.50;
                                                        
                                                    }else if($re['tnh'] >= 40){
                                                        $weights = 2.0;
                                                    }else{
                                                        $weights = 0;
                                                    }

                                                echo $weights; ?></td>
                                                <td><?php echo $re['npt']*$weights; ?></td>
                                            </tr>
                                    <?php } } ?>
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
        vvar data = $(this).val();
            if (confirm("Do you really want to delete this program data?"))
            {
                var row = $(this).parents('tr');

                $.post("extdel.php", {
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
