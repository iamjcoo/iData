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
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>GRADUATE PROGRAM</h2>
                            <?php $period = $_GET['period']; ?>
                            <small>Add New Data on Enrolment in Graduate Programs for School Year <?php echo $period; ?></small>
                        </div>
                        <div class="body">
                            <form id="add" name="add">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="pn" required>
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
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-sm-6">
                                <div class="switch">
                                    <label>
                                    Priority
                                    <input type="checkbox" id="checkbox1" name="priority">
                                    <span class="lever"></span>
                                    </label>
                                </div>
                                </div>
                                <div class="col-sm-6">
                                 <div class="switch">
                                    <label>
                                    Mandated
                                    <input type="checkbox" id="checkbox2" name="mandated">
                                    <span class="lever"></span>
                                    </label>
                                </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control" id="telp" required>
                                        <label class="form-label">Total Enrolment in the Ladderized Program</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control" id="tety" required>
                                        <label class="form-label">Total Enrolment in the Terminal Year</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control" id="tngapril" required>
                                        <label class="form-label">Total No. Of Graduates April <?php echo $period; ?></label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control" id="tngsummer" required>
                                        <label class="form-label">Total No. Of Graduates Summer <?php echo $period; ?></label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control" id="tngoct" required>
                                        <label class="form-label">Total No. Of Graduates October <?php echo $period; ?></label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" step="any" min="0" class="form-control" id="weights" required>
                                        <label class="form-label">Weights</label>
                                    </div>
                                </div>
                                <input type="hidden" id="period" value="<?php echo $period; ?>">
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
        var priority1 = document.getElementById('checkbox1');
        var mandated1= document.getElementById('checkbox2');
        var mandated1 = checkbox2.checked;
        var priority1 = checkbox1.checked;
        if(mandated1 == true){
            mandated = 1;
        }else{
            mandated = 2; 
        }
        if(priority1 == true){
            priority = 1;
        }else{
            priority = 2; 
        }
        var telp = $("#telp").val();
        var tety = $("#tety").val();
        var tngapril = $("#tngapril").val();
        var tngsummer = $("#tngsummer").val();
        var tngoctober = $("#tngoct").val();
        var weights = $("#weights").val();
        var period = $("#period").val();
        if (pn == '' || du == '' ||  weights == '' || period == '') {
         $.notify({
            // options
            message: 'Please fill in all the feilds!' 
            },{
                // settings
                type: 'warning'
            });
        } else {
        // Returns successful data submission message when the entered information is stored in database.
        $.post("querygradnewgp.php", {
        pn: pn,
        du: du,
        telp: telp,
        tety: tety,
        mandated: mandated,
        priority: priority,
        weights: weights,
        period: period,
        tngapril: tngapril,
        tngsummer: tngsummer,
        tngoctober: tngoctober
        }, function(data) {
        $.notify({
            // options
            message: 'Successfully Added!' 
            },{
                // settings
                type: 'success'
            });
        $('#add')[0].reset(); // To reset form fields
        });
        }
        });
    });
</script>
<script src="../extra/js/pages/forms/basic-form-elements.js"></script>
</body>

</html>
