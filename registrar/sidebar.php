<?php
require_once("../PHPconnect/phpC.php");
if(!isset($_SESSION['idataregistrar'])){
    header('Location: ../sign-in.php');
}else{
    
}

?>
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="favicon.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <?php
                        $uname = $_SESSION['idataregistrar'];
                        $query = mysqli_query($link, "SELECT * FROM user WHERE username ='$uname'");
                        $res = mysqli_fetch_assoc($query);
                    ?>
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $res['username'];?></div>
                    <div class="email"><?php echo $res['email'];?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="editprof.php"><i class="material-icons">person</i>Edit Profile</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="?logout"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="index.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                            <i class="material-icons">assignment</i>
                            <span>Enrolment</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">Undergraduate Program</a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">Add New Program & Data</a>
                                        <ul class="ml-menu">
                                            <?php
                                                $query = mysqli_query($link, "SELECT * FROM period ORDER BY sy");
                                                while($res = mysqli_fetch_array($query)){
                                            ?>
                                            <li>
                                                <a href="enrnewup.php?period=<?php echo $res['id']; ?>" class=" waves-effect waves-block"><?php echo $res['semester']; ?> Semester School Year <?php echo $res['sy']; ?></a>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">Edit Program & Data</a>
                                        <ul class="ml-menu">
                                            <?php
                                                $query = mysqli_query($link, "SELECT * FROM period ORDER BY sy");
                                                while($res = mysqli_fetch_array($query)){
                                            ?>
                                            <li>
                                                <a href="enreditup.php?period=<?php echo $res['id']; ?>" class=" waves-effect waves-block"><?php echo $res['semester']; ?> Semester School Year <?php echo $res['sy']; ?></a>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">Graduate Program</a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">Add New Program & Data</a>
                                        <ul class="ml-menu">
                                            <?php
                                                $query = mysqli_query($link, "SELECT * FROM period ORDER BY sy");
                                                while($res = mysqli_fetch_array($query)){
                                            ?>
                                            <li>
                                                <a href="enrnewgp.php?period=<?php echo $res['id']; ?>" class=" waves-effect waves-block"><?php echo $res['semester']; ?> Semester School Year <?php echo $res['sy']; ?></a>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">Edit Program & Data</a>
                                        <ul class="ml-menu">
                                            <?php
                                                $query = mysqli_query($link, "SELECT * FROM period ORDER BY sy");
                                                while($res = mysqli_fetch_array($query)){
                                            ?>
                                            <li>
                                                <a href="enreditgp.php?period=<?php echo $res['id']; ?>" class=" waves-effect waves-block"><?php echo $res['semester']; ?> Semester School Year <?php echo $res['sy']; ?></a>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                                    Summary of Enrolment
                                </a>
                                <ul class="ml-menu">
                                            <?php
                                                $query = mysqli_query($link, "SELECT * FROM period ORDER BY sy");
                                                while($res = mysqli_fetch_array($query)){
                                            ?>
                                            <li>
                                                <a href="enrsummary.php?period=<?php echo $res['id']; ?>" class=" waves-effect waves-block"><?php echo $res['semester']; ?> Semester School Year <?php echo $res['sy']; ?></a>
                                            </li>
                                            <?php } ?>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                            <i class="material-icons">school</i>
                            <span>Graduates</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">Undergraduate Program</a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">Add New Program & Data</a>
                                        <ul class="ml-menu">
                                            <?php
                                                    $query = mysqli_query($link, "SELECT * FROM dyear ORDER BY year ASC");
                                                    while($res = mysqli_fetch_array($query)){
                                            ?>
                                            <li>
                                                <a href="gradnewup.php?period=<?php echo $res['id']; ?>" class=" waves-effect waves-block"><?php echo $res['year']; ?></a>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">Edit Program & Data</a>
                                        <ul class="ml-menu">
                                            <?php
                                                    $query = mysqli_query($link, "SELECT * FROM dyear ORDER BY year ASC");
                                                    while($res = mysqli_fetch_array($query)){
                                            ?>
                                            <li>
                                                <a href="gradeditup.php?period=<?php echo $res['id']; ?>" class=" waves-effect waves-block"><?php echo $res['year']; ?></a>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">Graduate Program</a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">Add New Program & Data</a>
                                        <ul class="ml-menu">
                                            <?php
                                                    $query = mysqli_query($link, "SELECT * FROM dyear ORDER BY year ASC");
                                                    while($res = mysqli_fetch_array($query)){
                                            ?>
                                            <li>
                                                <a href="gradnewgp.php?period=<?php echo $res['id']; ?>" class=" waves-effect waves-block"><?php echo $res['year']; ?></a>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">Edit Program & Data</a>
                                        <ul class="ml-menu">
                                            <?php
                                                    $query = mysqli_query($link, "SELECT * FROM dyear ORDER BY year ASC");
                                                    while($res = mysqli_fetch_array($query)){
                                            ?>
                                            <li>
                                                <a href="gradeditgp.php?period=<?php echo $res['id']; ?>" class=" waves-effect waves-block"><?php echo $res['year']; ?></a>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                                    Data on Graduates
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">Undergraduates Program</a>
                                        <ul class="ml-menu">
                                            <?php
                                                    $query = mysqli_query($link, "SELECT * FROM dyear ORDER BY year ASC");
                                                    while($res = mysqli_fetch_array($query)){
                                            ?>
                                            <li>
                                                <a href="gradsummaryup.php?period=<?php echo $res['id']; ?>" class=" waves-effect waves-block"><?php echo $res['year']; ?></a>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">Graduates Program</a>
                                        <ul class="ml-menu">
                                            <?php
                                                    $query = mysqli_query($link, "SELECT * FROM dyear ORDER BY year ASC");
                                                    while($res = mysqli_fetch_array($query)){
                                            ?>
                                            <li>
                                                <a href="gradsummarygp.php?period=<?php echo $res['id']; ?>" class=" waves-effect waves-block"><?php echo $res['year']; ?></a>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </li>
                    <li class="update-boarde">
                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                            <i class="material-icons">equalizer</i>
                            <span>Board Exam </span>
                        </a>
                        <ul class="ml-menu ">
                            <li>
                                <a href="boardenew.php" class="waves-effect waves-block">Add New Program & Data</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">Edit Program & Data</a>
                                <ul class="ml-menu">
                                <?php
                                    $query = mysqli_query($link, "SELECT * FROM dyear");
                                    while($res = mysqli_fetch_array($query)){
                                ?>
                                    <li>
                                        <a href="boardemanage.php?period=<?php echo $res['year']; ?>" class=" waves-effect waves-block"><?php echo $res['year']; ?></a>
                                    </li>
                                <?php } ?>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">Data on Board Exam</a>
                                <ul class="ml-menu">
                                <?php
                                    $query = mysqli_query($link, "SELECT * FROM dyear");
                                    while($res = mysqli_fetch_array($query)){
                                ?>
                                    <li>
                                        <a href="boardesummary.php?period=<?php echo $res['year']; ?>" class=" waves-effect waves-block"><?php echo $res['year']; ?></a>
                                    </li>
                                <?php } ?>
                                </ul>
                            </li>
                         </ul>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2017 <a href="javascript:void(0);">Teen Wolf</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
                <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red" class="active">
                            <div class="red"></div>
                            <span>Red</span>
                        </li>
                        <li data-theme="pink">
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>Deep Purple</span>
                        </li>
                        <li data-theme="indigo">
                            <div class="indigo"></div>
                            <span>Indigo</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="light-blue">
                            <div class="light-blue"></div>
                            <span>Light Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="teal">
                            <div class="teal"></div>
                            <span>Teal</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="light-green">
                            <div class="light-green"></div>
                            <span>Light Green</span>
                        </li>
                        <li data-theme="lime">
                            <div class="lime"></div>
                            <span>Lime</span>
                        </li>
                        <li data-theme="yellow">
                            <div class="yellow"></div>
                            <span>Yellow</span>
                        </li>
                        <li data-theme="amber">
                            <div class="amber"></div>
                            <span>Amber</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div>
                            <span>Deep Orange</span>
                        </li>
                        <li data-theme="brown">
                            <div class="brown"></div>
                            <span>Brown</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>Grey</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div>
                            <span>Blue Grey</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>Black</span>
                        </li>
                    </ul>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="settings">
                    <div class="demo-settings">
                        <p>GENERAL SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Report Panel Usage</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Email Redirect</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>SYSTEM SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Notifications</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Auto Updates</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>ACCOUNT SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Offline</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Location Permission</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>

