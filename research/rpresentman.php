<?php
require_once("../PHPconnect/phpC.php");
if(!isset($_SESSION['idataresearch'])){
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
                                RESEARCH PRESENTATIONS
                            </h2>
                            <?php $period = $_GET['period']; ?>
                            <small>Research Presentations for <?php echo $period; ?></small>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable jquery-datatable dt-responsive display nowrap js-exportable" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>Research Title</th>
                                        <th>Type of Research</th>
                                        <th>Project/ Study Duration</th>
                                        <th>Mo. & Year Started</th>
                                        <th>Mo. & Year Completed</th>
                                        <th>Date Presented</th>
                                        <th>Type of Conference/ Forum</th>
                                        <th>Venue of the Conference/ Forum</th>
                                        <th>Title of the Conference/Forum</th>
                                        <th>Name of Author/s</th>
                                        
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
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                    </tr>
                                    <?php
                                            $did = $r['id'];
                                            $period1 = $period . "-01-01";
                                            $period2 = $period . "-12-31";
                                            $qu = mysqli_query($link, "SELECT * FROM r_present WHERE delivery_unit = '$did' AND date_presented >= '$period1' AND date_presented <= '$period2'");
                                            while($re = mysqli_fetch_array($qu)){
                                            ?>
                                            <tr>
                                                <th><a href="rpedit.php?period=<?php echo $period; ?>&id=<?php echo $re['id']; ?>"><button type="button"  class="btn bg-teal btn-sm waves-effect"><i class="material-icons">create</i></button></a>&nbsp;<button type="button" value="<?php echo $re['id']; ?>"" class="delete btn bg-red btn-sm waves-effect"><i class="material-icons">delete</i></button> </th>
                                                <td><?php echo $re['title']; ?></td>
                                                <td><?php echo $re['type']; ?></td>
                                                <td><?php echo $re['p_duration']; ?></td>
                                                <td><?php echo $re['date_started']; ?></td>
                                                <td><?php echo $re['date_completed']; ?></td>
                                                <td><?php echo $re['date_presented']; ?></td>
                                                <td><?php echo $re['fc_type']; ?></td>
                                                <td><?php echo $re['venue']; ?></td>
                                                <td><?php echo $re['f_title']; ?></td>
                                                <td><?php echo $re['authors']; ?></td>
                                            </tr>
                                            <?php
                                            }
                                        }
                                    ?>
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

                $.post("queryrpresentdel.php", {
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
            }
            return false;
        });
</script>
</body>

</html>
