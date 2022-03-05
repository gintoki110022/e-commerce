<?php
if (isset($_SESSION['id'])) {
    $query = mysqli_query($conn, "select * from USER where user_id='" . $_SESSION['id'] . "'");
    $row = mysqli_fetch_array($query);

    if ($row['access'] == 'ADMIN') {
        header('location:admin/');
    } else header('location:home.html');
    exit;
}
?>
<link href="css/login.css" rel="stylesheet">
<center>
    <div class="modal" id="myModal">
        <div class="modal-dialog">

            <!-- Modal body -->
            <div class="modal-body">
                <div class="container-login" id="loginForm">
                    <h1 class="text-white">
                        <center>Login</center>
                    </h1>
                    <hr>
                    <form method="POST" action="login_processing.php" id="input">
                        <label id="elabel" for="username">Username</label>
                        <input type="text" placeholder="Enter your username..." id="username" name="username" required>

                        <label id="plabel" for="password">Password</label>
                        <input type="password" placeholder="Enter your password..." id="password" name="password" title="Must contain at least 8 or more characters" required>
                        <button type="submit" value="Login"><i class="fas fa-sign-in-alt"></i> Login</button>
                        <div class="text-center" id="reg-div"><b id="reg-label">Don't have an account?</b> <a class="text-btn" href="index.php?page=register">Sign up</a></div>
                    </form>
                </div>
                <div class="container-bottom" id="message">
                    <h3 class="black-text">Password must contains the following:</h3>
                    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                    <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                    <p id="number" class="invalid">A <b>number</b></p>
                    <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                </div>
            </div>
        </div>
    </div>
</center>
<script>
    document.getElementById("myModal").style.display = 'block';
</script>
