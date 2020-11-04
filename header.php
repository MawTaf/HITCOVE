<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    if (isset($_SESSION['message'])) {
        $message = $_SESSION['message'];
        echo "<script>alert(\"$message\");</script>";
        unset($_SESSION['message']);
    }

    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/home.css">
    <link rel="shortcut icon"  type="image/png" href="logo.png">
</head>

<body>
    <nav>
        <div id="logo">
            <a href="index.php"><img src="img/hit logo.png" alt="Logo"></a>
        </div>
        <ul>
            <li><a href="index.php"><b>Home</b></a></li>
            <li><a href="Apply.php"><b>Apply</b></a></li>
            <li><a href="Update.php"><b>Profile</b></a></li>
            <li><a href="notification.php"><b>Updates</b></a></li>
        </ul>


        <?php
        if (isset($_SESSION['regnum'])) {
            echo '
                <form action="includes/logout.inc.php" method="POST" style="display: contents;">
                <input type="submit" name="logout-btn" value="LogOut">
                </form>';
        } else {
            echo "
                    <form action='includes/login.inc.php' method='POST' style='display: contents;'>
                    <input type='text'  name='regnum' placeholder='Reg Number' required maxlength = '10'>
                    <input type='password'  name='std-pass' placeholder='Password'>
                    <input type='submit'  name='login-btn' value='Login'>
                </form>
                <input type='submit' value='SignUp' id='signup' style='margin:9px;
                background-color:white;
                color: #3434a5;
                border-style: none;
                box-shadow: 2px 1px 2px 1px grey;
                height: 37px;
                width: 5%;'>";
        }
        ?>





    </nav>