<?php
    require_once("PHPconnect/phpC.php");
    if(!isset($_SESSION['idataadmin'])&&!isset($_SESSION['idataregistrar'])&&!isset($_SESSION['idataresearch'])&&!isset($_SESSION['idataextension'])){

    }
    if(isset($_SESSION['idataadmin'])!=""){
        header('Location: admin/index.php');
    }
    if(isset($_SESSION['idataregistrar'])!=""){
        header('Location: registrar/index.php');
    }
    if(isset($_SESSION['idataresearch'])!=""){
        header('Location: research/index.php');
    }
    if(isset($_SESSION['idataextension'])!=""){
        header('Location: extension/index.php');
    }
    

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>iData :: Databanking System</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="extra/css/icon.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="extra/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="extra/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="extra/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="extra/css/style.css" rel="stylesheet">
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

<body class="login-page" style="background-image: url(extra/images/bg.jpg); background-repeat: no-repeat; background-attachment: fixed; background-position: center; background-size: cover; -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;">
  <?php
    if(isset($_POST['login'])){
        $uname = $_POST['username'];
        $pwd = md5($_POST['password']);

        $query = mysqli_query($link, "SELECT * FROM user WHERE username = '$uname' AND password = '$pwd'");
        $rnum = mysqli_num_rows($query);
        $res = mysqli_fetch_assoc($query);
        if($rnum>=1){
            if($res['restriction']=="Administrator"){
                $_SESSION['idataadmin'] = $uname;
                $_SESSION['idataadminid'] = $res['id'];
                header('Location: admin/index.php');
            }else if($res['restriction']=="Registrar"){
                $_SESSION['idataregistrar'] = $uname;
                 $_SESSION['idataregistrarid'] = $res['id'];
                header('Location: registrar/index.php');
            }else if($res['restriction']=="Research"){
                $_SESSION['idataresearch'] = $uname;
                 $_SESSION['idataresearchid'] = $res['id'];
                header('Location: research/index.php');
            }else if($res['restriction']=="Extension"){
                $_SESSION['idataextension'] = $uname;
                $_SESSION['idataextensionid'] = $res['id'];
                header('Location: extension/index.php');
            }
        }else{
            echo '<div class="alert alert-danger">
                                <strong>Oh snap!</strong> You have submitted a wrong email and password.
                            </div>';
        }
        
    }
    ?>
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);"><b>iData</b></a>
            <small>CSPC Databanking System</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="sign-in.php">
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            <input class="btn btn-block bg-pink waves-effect" type="submit" name="login" value="SIGN IN">
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="extra/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="extra/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="extra/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="extra/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="extra/js/admin.js"></script>
    <script src="extra/js/pages/examples/sign-in.js"></script>
    <script>
    $(document).ready(function()
{ 
       $(document).bind("contextmenu",function(e){
              return false;
       }); 
});
</script>
</body>

</html>
