<?php                 
require_once("../PHPconnect/phpC.php");
?>

labels: [
<?php
    $mark4 = 0;
    $tng = 0;
    $tety = 0;
    $telp = 0;
    $te = 0;
    $tngsummer = 0;
    $tngapril = 0;
    $tngoctober = 0;
    $b=0;
    $period = $_GET['period'];
    $query = mysqli_query($link, "SELECT * FROM delivery_units");
    while($res=mysqli_fetch_array($query)){
        echo '"'. $res['acronym'].'",';
        $mark4 = $mark4 + 1;
        $du = $res['id'];
        $aquery = mysqli_query($link, "SELECT * FROM graduates WHERE prog_sort = 'Undergraduate' AND year='$period' AND delivery_unit = '$du'");
        while($ress=mysqli_fetch_array($aquery)){
            $telp = $telp + $ress['telp'];
            $tety = $tety + $ress['tety'];
            $tngapril = $tngapril + $ress['tngapril'];
            $tngsummer = $tngsummer + $ress['tngsummer'];
            $tngoctober = $tngoctober + $ress['tngoctober'];
        }
            $tng = $tngapril + $tngsummer + $tngoctober;
            $te = $telp + $tety;
            $fail = $te - $tng;
            $pass = $tng;
            $failed[$b] = $fail;
            $passed[$b] = $pass;
            $b++;
            $mark4 = 0;
            $tng = 0;
            $tety = 0;
            $telp = 0;
            $te = 0;
            $tngsummer = 0;
            $tngapril = 0;
            $tngoctober = 0;

    }
?>
],
                datasets: [{
                    label: "Passed",
                    data: [
                    <?php
                    $b = $b - 1; 
                        for($a=0; $a<=$b; $a++){
                            echo $passed[$a].',';
                        }

                    ?>
                    ],
                    backgroundColor: 'rgba(0, 188, 212, 0.8)'
                }, {
                        label: "Failed",
                        data: [
                            <?php 
                                for($a=0; $a<=4; $a++){
                                echo $failed[$a].',';
                            }
                            ?>
                        ],
                        backgroundColor: 'rgba(233, 30, 99, 0.8)'
                    }]          