<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    header("location: user.php");
}

include_once "header.php"; ?>
<body>
<div class="wrapper">
        <section class="form login">
            <header>Realtime Chat App 2</header>
            <form action="#" autocomplete="off">
                <div class="error-txt"></div>
                <div class="field input">
                    <label for="">E-mail Address</label>
                    <input type="email" placeholder="Enter your E-mail" name="email">
                </div>
                <div class="field input">
                    <label for="">Password</label>
                    <input type="password" placeholder="Enter your Password" name="passwd">
                    <i class="fas fa-eye"></i>
                    
                </div>
                <div class="field button">
                    <input type="submit" value="Continue to Chat">
                </div>

            </form>
            <div class="link">Not yet signed up?
                <a href="index.php">Signup Now</a>
            </div>
        </section>
    </div>

    <script src="js/pass-show-hide.js"></script>
    <script src="js/login.js"></script>
</body>
</html>