<?php
include("security.php");
include('header.php'); 
?>
<title>Home</title>
<div class="banner">
    <div class="wrapper">
        <h3>Welcome To <span style="color:#3434a5">HITCOVE</span></h3>
        <p>The Hostel Residential Application Website </p><br>
    </div>
</div>

<main>
    <h3 style="margin-left: 49%;">Rooms</h3>
    <div class="container">
        <div class="card">
            <img src="img/Hostel_4.jpg" alt="Hostel4">
            <h3>Hostel 4</h3>
    <ul style="display:inline-block;"> 
                <li>Girls only hostel</li>
                <li>2 oeople per room</li>
                <li>A room divider</li>
                <li></li>
            </ul>
        </div>

        <div class="card">
            <img src="img/Hostel_1.jpg" alt="Hostel1">
            <h3>Hostel 1</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Autem doloremque ipsa sint. Similique tempore atque eius quaerat sit et temporibus!</p>
        </div>

        <div class="card">
            <img src="img/Hostel 3 nd 2.jpg" alt="Hostel3nd2">
            <h3>Hostel 2 & 3</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, temporibus?</p>
        </div>
    </div>
    <div class="popup">
        <div class="signup-pop">
            <form action="includes/signup.inc.php" method="POST" autocomplete="off">
                <span class="close" onclick="document.querySelector('.popup').style.display='none'">&times;</span>
                <img src="img/student.svg" class="user-icon">
                <?php
                if (isset($_SESSION['success']) && $_SESSION['success'] != "") {
                    echo '<h3> ' . $_SESSION['success'] . ' </h3>';
                    unset($_SESSION['success']);
                }

                if (isset($_SESSION['status']) && $_SESSION['status'] != "") {
                    echo '<h3> ' . $_SESSION['status'] . ' </h3>';
                    unset($_SESSION['status']);
                }
                ?>
                <input type="text" name="regnum" placeholder="Registration Number.." maxlength="10" required>
                <input type="password" name="pass" placeholder="Password" required>
                <input type="password" name="passAgain" placeholder="Re-enter Password" required>
                <input type="submit" name="signup-btn" value="Signup">
            </form>
        </div>

    </div>
</main>
<script src="img/home.js"></script>
<footer>

    <div class="powered">
        Powered by HIT200
    </div>
    <div class="contact">
        <img src="img/mail.png" alt=""> Email Us on hitcove@gmail.com
        <img src="img/phone.png" alt="">Call Us on +263888499
    </div>
</footer>

<script>
    document.getElementById("signup").addEventListener("click", function() {
        document.querySelector(".popup").style.display = "flex";
    })
</script>
</body>

</html>