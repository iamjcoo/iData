<?php
require_once("../PHPconnect/phpC.php");
if(!isset($_SESSION['idataresearch'])){
    header('Location: ../sign-in.php');
}else{
$tmark1 = 0;
$tmark2 = 0;
$mark = 0;
$tmark = 0;
$i = 0;
$researcher = "";
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
    <title>Researches with Track Records <?php echo $_GET['period']; ?></title>
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
    <link href="../extra/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

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
            
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                COMPLETED RESEARCHES <?php echo $_GET['period']; ?>
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable jquery-datatable js-exportable dt-responsive display nowrap" cellspacing="0">
                            <thead>
                                <th>Research</th>
                                <th>Researcher</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php
                                $query1 = mysqli_query($link, "SELECT * FROM researcher");
                                while($res = mysqli_fetch_array($query1)){
                                    $rid = $res['id'];
                                    $query3 = mysqli_query($link, "SELECT * FROM cresearcher WHERE researcher = '$rid'");
                                    while($res3 = mysqli_fetch_array($query3)){
                                        $res3['research'];
                                ?>
                                <tr>
                                    <td><?php echo $res3['research']; ?></td>
                                    <td><?php echo $res['researcher']; ?></td>
                                    <td><a href="editcresearches.php?id=<?php echo $res3['id']; ?>&author=<?php echo $res['id']; ?>"><button type="button"  class="btn bg-teal btn-sm waves-effect"><i class="material-icons">create</i></button></a>&nbsp;<button type="button" value="<?php echo $res3['id']; ?>"" class="delete btn bg-red btn-sm waves-effect"><i class="material-icons">delete</i></button> </td>
                                <tr>
                                <?php } } ?>
                            </tbody>
                            </table>
                        </div>
                    </div>
             </div>
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
        var data = $(".delete").val();
            if (confirm("Do you really want to delete this program data?"))
            {
                var row = $(this).parents('tr');

                $.post("querymanagec.php", {
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