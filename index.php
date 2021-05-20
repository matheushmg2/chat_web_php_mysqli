<?php 
session_start();
if (isset($_SESSION['unique_id'])) {
    header("location: user.php");
}
include_once "header.php"; ?>
<body>
<div class="wrapper">
        <section class="form signup">
            <header>Realtime Chat App</header>
            <form action="#" enctype="multipart/form-data" autocomplete="off">
                <div class="error-txt"></div>
                <div class="name-details">
                    <div class="field input">
                        <label for="">First Name</label>
                        <input type="text" placeholder="First Name" name="fname" require>
                    </div>
                    <div class="field input">
                        <label for="">Last Name</label>
                        <input type="text" placeholder="Last Name" name="lname" require>
                    </div>
                </div>
                <div class="field input">
                    <label for="">E-mail Address</label>
                    <input type="text" placeholder="E-mail Address" name="email" require>
                </div>
                <div class="field input">
                    <label for="">Password</label>
                    <input type="password" placeholder="Enter new Password" name="passwd" require>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field image">
                    <label for="">Select Image</label>
                    <input type="file" name="image">
                </div>
                <div class="field button">
                    <input type="submit" value="Continue to Chat">
                </div>

            </form>
            <div class="link">Already signed up?
                <a href="login.php">Login Now</a>
            </div>
        </section>
    </div>

    <script src="js/pass-show-hide.js"></script>
    <script src="js/signup.js"></script>
</body>
</html>