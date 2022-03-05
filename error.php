
<link href="css/login.css" rel="stylesheet">
<center>
    <div class="modal" id="myModal">
        <div class="modal-dialog">

            <!-- Modal body -->
            <div class="modal-body">
                <div class="container-login" id="loginForm">
                    <center>
                        <h3><?php echo isset($_SESSION["error"]) ? $_SESSION["error"] : 'Something went wrong'; ?>!<h3>
                    </center>
                    <button class="" onclick=" window.location.href='home.html';" id="submit-button">Return</button>
                </div>
            </div>
        </div>
    </div>
    </div>
</center>
<script>
    document.getElementById("myModal").style.display = 'block';
</script>