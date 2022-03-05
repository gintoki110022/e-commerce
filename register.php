<link href="css/login.css" rel="stylesheet">
<center>
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <!-- Modal body -->
      <div class="modal-body">
        <div class="container-login" id="loginForm">
          <h1 class="text-white">
            <center>Register</center>
          </h1>
          <hr>
          <form method="post" action="register_processing.php" id="input">
            <label id="nlabel" for="name">Name</label>
            <input type="text" placeholder="Enter your name..." id="name" name="name" required>

            <label id="unlabel" for="username">Username</label>
            <input type="text" placeholder="Enter your username..." id="username" name="username" required>

            <label id="plabel" for="password">Password</label>
            <input type="password" placeholder="Enter your password..." id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>

            <label id="clabel" for="confirm_password">Confirm password</label>
            <input type="password" placeholder="Re enter your password..." id="confirm_password" name="confirm_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>

            <label id="phone_number_label" for="phone_number">Phone number</label>
            <input type="text" placeholder="Enter your phone number..." id="phone_number" name="phone_number" pattern="(?=.*\d).{8,}" required>

            <label id="elabel" for="email">Email</label>
            <input type="text" placeholder="Enter your email..." id="email" name="email" required>

            <label id="addresslabel" for="address">Address</label>
            <input type="text" placeholder="Enter your address..." id="address" name="address" required>

            <button type="submit" name="validate" id="validate" value="Register"><i class="fas fa-user-plus"></i> Register</button>
            <?php if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] === false) { ?>
              <div class="text-center" id="reg-div"><b id="reg-label">Already had an account?</b> <a class="text-btn" href="index.php?page=login">Sign in</a></div>
            <?php } ?>
          </form>
        </div>
        <div class="container-bottom" id="message">
          <h3 class="black-text">Password must contains the following:</h3>
          <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
          <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
          <p id="number" class="invalid">A <b>number</b></p>
          <p id="length" class="invalid">Minimum <b>8 characters</b></p>
        </div>
        <div class="container-bottom" id="confirmMessage">
          <p id="match" class="invalid">Password <b>match</b></p>
        </div>
      </div>
    </div>
  </div>
  </div>
</center>
<script>
  document.getElementById("myModal").style.display = 'block';
</script>
<script type="text/javascript" src="validate.js"></script>
<script type="text/javascript" src="register.js"></script>