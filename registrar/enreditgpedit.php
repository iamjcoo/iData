<?php
require_once("../PHPconnect/phpC.php");
if(!isset($_SESSION['idataregistrar'])){
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
    <link href="../extra/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

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
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>GRADUATE PROGRAM
                            <?php
                                $period = $_GET['period'];
                                $query = mysqli_query($link, "SELECT * FROM period WHERE id = '$period'");
                                $res = mysqli_fetch_assoc($query);
                            ?></h2>
                            <small>Edit program and data in Graduate Programs for <?php echo $res['semester']; ?> Semester, School Year <?php echo $res['sy']; ?></small>
                        </div>
                        <div class="body">
                            <form id="add" name="add">
                             <?php
                                $period = $_GET['period'];
                                $eid = $_GET['id'];
                                $query1 = mysqli_query($link, "SELECT * FROM enrolment WHERE id = '$eid'");
                                $resul = mysqli_fetch_assoc($query1);
                            ?>
                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                        <input type="text" class="form-control" id="pn" value="<?php echo $resul['pn']; ?>" required>
                                        <label class="form-label">Program Name</label>
                                    </div>
                                </div>
                                <div class="form-group  col-sm-12">
                                    <select class="form-control show-tick" id="du" required>
                                        <option value="">Please Select a Delivery Unit/Department</option>
                                        <?php
                                            $q = mysqli_query($link, "SELECT * FROM delivery_units");
                                            while($resu=mysqli_fetch_array($q)){
                                        ?>
                                        <option value="<?php echo $resu['id'] ?>"><?php echo $resu['acronym'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div><div class="clearfix"></div>
                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                        <input type="number" class="form-control" value="<?php echo $resul['head_count']; ?>" id="hc" required>
                                        <label class="form-label">Head Count</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                        <input type="number" class="form-control" value="<?php echo $resul['total_enr_units']; ?>" id="teu" required>
                                        <label class="form-label">Total Enrolled Units</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                        <input type="text" step="any" min="0" value="<?php echo $resul['weights']; ?>" class="form-control" id="weights" required>
                                        <label class="form-label">OPIF/NF weights</label>
                                    </div>
                                </div>
                                <input type="hidden" id="eid" value="<?php echo $eid; ?>">
                                <button class="btn btn-primary waves-effect" type="button" id="submit">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Validation -->
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

    <!-- Custom Js -->
    <script src="../extra/js/admin.js"></script>

    <!-- Demo Js -->
    <script src="../extra/js/demo.js"></script>
    <script src="../extra/js/pages/forms/form-validation.js"></script>

    <!-- Jquery Validation Plugin Css -->
    <script src="../extra/plugins/jquery-validation/jquery.validate.js"></script>
    <!-- Bootstrap Notify Plugin Js -->
    <script src="../extra/plugins/bootstrap-notify/bootstrap-notify.js"></script>
    <script>
    $(document).ready(function()
{ 
       $(document).bind("contextmenu",function(e){
              return false;
       }); 
       
});
    $(document).ready(function() {
        $("#submit").click(function() {
        var pn = $("#pn").val();
        var du = $("#du").val();
        var hc = $("#hc").val();
        var teu = $("#teu").val();
        var weights = $("#weights").val();
        var eid = $("#eid").val();
        if (pn == '' || du == '' || hc == '' || teu == '' || weights == '' || eid == '') {
         $.notify({
            // options
            message: 'Please fill in all the feilds!' 
            },{
                // settings
                type: 'warning'
            });
        } else {
        // Returns successful data submission message when the entered information is stored in database.
        $.post("queryenreditgp.php", {
        pn: pn,
        du: du,
        hc: hc,
        teu: teu,
        weights: weights,
        eid: eid,
        }, function(data) {
        $.notify({
            // options
            message: 'Successfully Edited!' 
            },{
                // settings
                type: 'success'
            });
        $("#add").load(); // To reload form
        });
        }
        });
    });
</script>
</body>

</html>
