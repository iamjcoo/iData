<?php
require_once("../PHPconnect/phpC.php");
if(!isset($_SESSION['idataadmin'])){
    header('Location: ../sign-in.php');
}else{
    $tng = 0;
    $tety = 0;
    $telp = 0;
    $te = 0;
    $fail = 0;
    $pass = 0;
    $tngsummer = 0;
    $tngapril = 0;
    $tngoctober = 0;
    $fperc = 0;
    $pperc = 0;
    $a = 0;
    $du = 0;
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
    <title>iData | Mining CSPC Databank for Performance Analysis</title>
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

    <!-- Custom Css -->
    <link href="../extra/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../extra/css/themes/all-themes.css" rel="stylesheet" />
    
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
            <div class="block-header">
                <h2>
                    GRAPHICAL RESULT
                    <small>Taken from Data Mining</a></small>
                </h2>
            </div>
            <div class="row clearfix">
                <!-- Bar Chart -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Graph Result by Delivery Units</h2>
                        </div>
                        <div class="body">
                            <canvas id="bar_chart1" height="150"></canvas>
                        </div>
                    </div>
                </div>
                <!-- #END# Bar Chart -->

            </div>
            <div class="card">
                        <div class="header">
                            <h2>
                                Graph Result per Department by Course Program
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <?php
                                    $query = mysqli_query($link, "SELECT * FROM delivery_units");
                                    while($res=mysqli_fetch_array($query)){
                                ?>
                                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                    <button  data-toggle="modal" data-target="#<?php echo $res['acronym']; ?>" class="btn btn-primary btn-lg btn-block waves-effect" type="button"><span class="badge"><?php echo $res['acronym']; ?></span></button>
                                </div>
                                <?php 
                                    $a++;
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
        </div>

    </section>


    <!-- Modal -->
    <?php
        $query = mysqli_query($link, "SELECT * FROM delivery_units");
        while($res=mysqli_fetch_array($query)){
    ?>
            <div class="modal fade" id="<?php echo $res['acronym']; ?>" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="largeModalLabel">Graph Result of the
                            <?php
                                echo $res['name']; 
                            ?>
                            </h4>
                        </div>
                        <div class="modal-body">
                                <div class="body">
                                    <canvas id="<?php echo strtolower($res['acronym'])."1"; ?>" height="150"></canvas>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>
    <?php } ?>
    <!-- Jquery Core Js -->
    <?php echo $_SESSION['du']; ?>
    <script src="../extra/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../extra/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../extra/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../extra/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../extra/plugins/node-waves/waves.js"></script>

    <!-- Chart Plugins Js -->
    <script src="../extra/plugins/chartjs/Chart.bundle.js"></script>

    <!-- Custom Js -->
    <script src="../extra/js/admin.js"></script>


    <!-- Demo Js -->
    <script src="../extra/js/demo.js"></script>
    
    <script>
        
        $(function () {
            new Chart(document.getElementById("bar_chart1").getContext("2d"), getChartJs('bar1'));
            <?php
                $d=1;
                $query = mysqli_query($link, "SELECT * FROM delivery_units");
                while($res=mysqli_fetch_array($query)){
            ?>
            new Chart(document.getElementById("<?php echo strtolower($res['acronym'])."1"; ?>").getContext("2d"), getChartJs('<?php echo strtolower($res['acronym'])."1"; ?>'));

            <?php } ?>
        });

        function getChartJs(type) {
            var config = null;

            if (type === 'bar1') {
                config = {
                    type: 'bar',
                    data: {
                        <?php require_once('api_du.php'); ?>
                    },
                    options: {
                        responsive: true,
                        legend: true
                    }
                }
            }
            <?php
                $d=1;
                $query = mysqli_query($link, "SELECT * FROM delivery_units");
                while($res=mysqli_fetch_array($query)){
            ?>
            else if (type === '<?php echo strtolower($res['acronym'])."1"; ?>') {
                config = {
                    type: 'bar',
                    data: {
                        labels: [
                        <?php
                            $du = $res['id'];
                            $period = $_GET['period'];
                            $query1 = mysqli_query($link, "SELECT * FROM graduates WHERE delivery_unit='$du' AND year='$period' AND prog_sort = 'Undergraduate'");
                            while($res1 = mysqli_fetch_array($query1)){
                               echo '"'.$res1['pn'].'",';
                            }
                        ?>
                        ],
                        datasets: [{
                            label: "Passed",
                            data: [
                                <?php
                                    $tng = 0;
                                    $tne = 0;
                                    $passed = 0;
                                    $failed = 0;
                                    $du = $res['id'];
                                    $period = $_GET['period'];
                                    $query1 = mysqli_query($link, "SELECT * FROM graduates WHERE delivery_unit='$du' AND year='$period' AND prog_sort = 'Undergraduate'");
                                    while($res1 = mysqli_fetch_array($query1)){
                                        $tng = $tng + $res1['tngapril']+ $res1['tngsummer'] + $res1['tngoctober'];
                                        echo $tng. ',';
                                    }
                                ?>
                            ],
                            backgroundColor: 'rgba(0, 188, 212, 0.8)'
                        }, {
                                label: "Failed",
                                data: [
                                <?php
                                    $tot=0;
                                    $tng = 0;
                                    $tne = 0;
                                    $passed = 0;
                                    $failed = 0;
                                    $du = $res['id'];
                                    $period = $_GET['period'];
                                    $query1 = mysqli_query($link, "SELECT * FROM graduates WHERE delivery_unit='$du' AND year='$period' AND prog_sort = 'Undergraduate'");
                                    while($res1 = mysqli_fetch_array($query1)){
                                        $tne = $tne + $res1['telp']+ $res1['tety'];
                                        $tng = $tng + $res1['tngapril']+ $res1['tngsummer'] + $res1['tngoctober'];
                                        $tot = $tne - $tng;
                                        if($tot<0){
                                            $tot = 0;
                                        }
                                        echo $tot. ',';
                                    }
                                ?>

                                ],
                                backgroundColor: 'rgba(233, 30, 99, 0.8)'
                        }]
                    },
                    options: {
                        responsive: true,
                        legend: true
                    }
                }
            }
            <?php } ?>
            return config;
        }
    
    </script>
</body>

</html>