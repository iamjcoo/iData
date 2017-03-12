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
                            <h2>RESEARCH PRESENTATION</h2>
                            <small>Add New Data on Research Presentation</small>
                        </div>
                        <div class="body">
                            <form id="add" name="add">
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

                                <div class="col-sm-12">
                                    <select class="form-control show-tick" id="tr" required>
                                        <option value="">Type of Research</option>
                                        <option value="Project">Project</option>
                                        <option value="Study">Study</option>
                                        <option value="Article">Article</option>
                                    </select>
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="rt" required>
                                        <label class="form-label">Research Title</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control" id="psd" required>
                                        <label class="form-label">Project/Study Duration (in terms of mos)</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                        <input type="date" class="form-control" id="mys" required>
                                        <label class="form-label">Mo. & Year Started</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                        <input type="date" class="form-control date" id="myc" required>
                                        <label class="form-label date">Mo. & Year Completed</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                        <input type="date" class="form-control" id="dp" required>
                                        <label class="form-label">Date Presented</label>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <select class="form-control show-tick" id="tcf" required>
                                        <option value="">Type of Conference/Forum</option>
                                        <option value="Institutional">Institutional</option>
                                        <option value=">Local">Local</option>
                                        <option value="National">National</option>
                                        <option value="International">International</option>
                                    </select>
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="vcf" required>
                                        <label class="form-label">Venue of the Conference/Forum</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="tocf" required>
                                        <label class="form-label">Title of the Conference/Forum</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="na" required>
                                        <label class="form-label">Name of Author/s</label>
                                    </div>
                                </div>
                                <button type="button" class="btn bg-teal waves-effect" id="addrp">SUBMIT</button>
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
        $("#addrp").click(function() {
        var du = $("#du").val();
        var tr = $("#tr").val();
        var rt = $("#rt").val();
        var psd = $("#psd").val();
        var mys = $("#mys").val();
        var myc = $("#myc").val();
        var dp = $("#dp").val();
        var tcf = $("#tcf").val();
        var vcf = $("#vcf").val();
        var tocf = $("#tocf").val();
        var na = $("#na").val();
        if (du == '' || tr == '' ||  rt == '' || psd == '' || mys == '' || myc == '' || dp == '' || tcf == '' || vcf == '' || tocf == '' || na == '') {
         $.notify({
            // options
            message: 'Please fill in all the feilds!' 
            },{
                // settings
                type: 'warning'
            });
        } else {
        // Returns successful data submission message when the entered information is stored in database.
        $.post("queryrpnew.php", {
            du: du,
            tr: tr,
            rt: rt,
            psd: psd,
            mys: mys,
            myc: myc,
            dp: dp,
            tcf: tcf,
            vcf: vcf,
            tocf: tocf,
            na: na,
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
<script src="../extra/js/pages/forms/advanced-form-elements.js"></script>
</body>

</html>

