<?php
ob_start();
session_start();
?>
<?php
if (isset($_SESSION['user_is_logged_in'])) {
    $fname = $_SESSION['user_data']['fname'];
    $name = $_SESSION['user_data']['name'];
    $phone = $_SESSION['user_data']['phone'];
    $aadhar = $_SESSION['user_data']['aadhar'];
    $image = $_SESSION['user_data']['image'];
    $pimage = $_SESSION['user_data']['pimage'];
    $vid = $_SESSION['user_data']['vid'];
    $vflag = $_SESSION['user_data']['vflag'];
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="script/script1.js"></script>
    <link rel="icon" type="image/ico" href="assets/images/geulogo.png" />
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/bootstrap1.css">
    <link href="css/googlefont.css" rel="stylesheet">
    <title>Online Voting System</title>
</head>
<body style="font-family:Verdana, Geneva, Tahoma, sans-serif; background-image: linear-gradient(to bottom right,rgba(70, 102, 219, 0.3),rgba(242, 148, 48, 0.2), rgb(240, 54, 239,0.2));">
    <nav class="navbar navbar-expand-lg fixed-top">
        <a class="navbar-brand" href="welcomepage.php"><b>Online Voting System</b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <form class="form-inline mr-5">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
                </form>
                <?php if (isset($_SESSION['user_is_logged_in'])) { ?>
                    <li class="nav-item mr-3">
                        <a class="nav-link" href="vote.php" id="nonlogin">Vote</a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link" href="profile.php" id="nonlogin">Profile</a>
                    </li>
                    <li class="nav-item dropdown"><?php echo $pimage ?></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $name ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" id="drop">
                            <a class="dropdown-item" href="profile.php">My Profile</a>
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </li>
                <?php } else { ?>
                    <li class="nav-item active mr-3">
                        <a class="nav-link" href="https://www.loksabhaelections.in/voting-system-in-india" target="_blank" id="nonlogin">About<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link" href="#" id="nonlogin">Contact Us</a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link" href="login.php" id="nonlogin">Login</a>
                    </li>
                <?php } ?>

            </ul>
        </div>
    </nav>