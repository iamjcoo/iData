                <?php
                require_once("../PHPconnect/phpC.php");
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
                $tot = 0;
                $mark=0;
                $mark2 = 0;
                $mark3=0;
                $mark4 = 0;
                $mark5 = 0;
                        $period = $_GET['period'];
                        $query = mysqli_query($link, "SELECT * FROM graduates WHERE prog_sort = 'Undergraduate' AND year='$period'");
                        while($res=mysqli_fetch_array($query)){
                            $telp = $telp + $res['telp'];
                            $tety = $tety + $res['tety'];
                            $tngapril = $tngapril + $res['tngapril'];
                            $tngsummer = $tngsummer + $res['tngsummer'];
                            $tngoctober = $tngoctober + $res['tngoctober'];
                        }
                        $tng = $tngapril + $tngsummer + $tngoctober;
                        $te = $telp + $tety;
                        $fail = $te - $tng;
                        $pass = $tng;
                        @$fperc = ($fail / $te) * 100;
                        @$pperc = ($pass / $te) * 100;
                        $_SESSION['tne'] = $te;

                  ?>{"key":"1", "name":"CSPC", "failp":"<?php echo round($fperc, 2, PHP_ROUND_HALF_UP); ?>", "fail":"<?php echo $fail; ?>", "passp":"<?php echo round($pperc, 2, PHP_ROUND_HALF_UP); ?>", "pass":"<?php echo $pass; ?>", "totalp":"<?php echo $fperc + $pperc; ?>", "totale":"<?php echo $fail + $pass; ?>", "node":"0"},
                    <?php
                        $period = $_GET['period'];
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
                        $key = 2;
                        $node=0; 
                        $query = mysqli_query($link, "SELECT * FROM delivery_units");
                        while($res=mysqli_fetch_array($query)){
                            $mark3 = $mark3 + 1;
                        }
                        $query = mysqli_query($link, "SELECT * FROM delivery_units");
                        while($res=mysqli_fetch_array($query)){
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
                        @$fperc = ($fail / $te) * 100;
                        @$pperc = ($pass / $te) * 100;
                        $tne = $_SESSION['tne'];
                        @$tp = (($fail + $pass) / $tne) * 100;
                        ?>
                        {"key":"<?php echo $key = $key + 1; $dnode = $key; ?>", "name":"<?php echo $res['acronym']; ?>", "failp":"<?php echo round($fperc, 2, PHP_ROUND_HALF_UP); ?>", "fail":"<?php echo $fail; ?>", "passp":"<?php echo round($pperc, 2, PHP_ROUND_HALF_UP); ?>", "pass":"<?php echo $pass; ?>", "totalp":"<?php echo round($tp, 2, PHP_ROUND_HALF_UP); ?>", "totale":"<?php echo $tot = $fail + $pass; ?>", "node":"<?php echo $node = $node + 1; ?>", "parent":"1"}

                    <?php
                        $bquery = mysqli_query($link, "SELECT * FROM graduates WHERE prog_sort = 'Undergraduate' AND year='$period' AND delivery_unit = '$du'");
                        while($ressss=mysqli_fetch_array($bquery)){
                            $mark5 = $mark5 + 1;
                        }
                        if($mark3 == $mark4){
                            if($mark5!=0){
                               echo ','; 
                            }
                        }else{
                            echo ',';
                        }
                    $tng = 0;
                    $mark5 = 0;
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
                        $bquery = mysqli_query($link, "SELECT * FROM graduates WHERE prog_sort = 'Undergraduate' AND year='$period' AND delivery_unit = '$du'");
                        while($ressss=mysqli_fetch_array($bquery)){
                            $mark = $mark + 1;
                        }
                        $aquery = mysqli_query($link, "SELECT * FROM graduates WHERE prog_sort = 'Undergraduate' AND year='$period' AND delivery_unit = '$du'");
                        while($resss=mysqli_fetch_array($aquery)){
                            $te = $resss['tety'] + $resss['telp'];
                            $tng = $resss['tngapril'] + $resss['tngsummer'] + $resss['tngoctober'];
                            $failpart = $te - $tng;
                            if($failpart == '-1'){
                                $fail = 0;
                            }else{
                                $fail = $failpart;
                            }
                            $pass = $tng;
                            $failp = ($fail / $te) * 100;
                            $passppart = ($pass / $te) * 100;
                            if($passppart > '100'){
                                $passp = 100;
                            }else{
                                $passp = $passppart;
                            }
                            $tp = (($fail + $pass) / $tot) * 100;
                        ?>
                        {"key":"<?php echo $key = $key + 1; ?>", "name":"<?php echo $resss['pn']; ?>", "failp":"<?php echo round($failp, 2, PHP_ROUND_HALF_UP); ?>", "fail":"<?php echo $fail; ?>", "passp":"<?php echo round($passp, 2, PHP_ROUND_HALF_UP); ?>", "pass":"<?php echo $pass; ?>", "totalp":"<?php echo round($tp, 2, PHP_ROUND_HALF_UP); ?>", "totale":"<?php echo $fail + $pass; ?>", "node":"<?php echo $node = $node + 1; ?>", "parent":"<?php echo $dnode; ?>"}

                    <?php
                        $mark2 = $mark2 + 1;
                        if($mark3 == $mark4){
                            if($mark2 == $mark){
                                
                            }else{
                                echo ',';
                            }
                        }else{
                            echo ',';
                        }
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
                        }
                        $tot = 0;
                        $mark2 = 0;
                        $mark = 0;
                        $mark5 = 0;

                        }

                    ?>
                