<?php
	ini_set('display_errors', '1');
	ini_set('display_startup_errors', '1');
	error_reporting(E_ALL);
?>

<?php
function is_email($str)
{
    return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
}

$error = array();
$data = array();
if (!empty($_POST['validate'])) {
    $data['name'] = isset($_POST['name']) ? $_POST['name'] : '';
    $data['username'] = isset($_POST['username']) ? $_POST['username'] : '';
    $data['password'] = isset($_POST['password']) ? $_POST['password'] : '';
    $data['confirm_password'] = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';
    $data['phone_number'] = isset($_POST['phone_number']) ? $_POST['phone_number'] : '';
    $data['email'] = isset($_POST['email']) ? $_POST['email'] : '';
    $data['address'] = isset($_POST['address']) ? $_POST['address'] : '';

    if (empty($data['name'])) {
        $error['name'] = 'Name is required!';
    }

    if (empty($data['username'])) {
        $error['username'] = 'Username is required!';
    }

    if (empty($data['password'])) {
        $error['pspasswordw'] = 'Password is required!';
    } else if (!preg_match('/[A-Z]/', $data['password'])) {
        $error['password'] = 'Password must contain uppercase!';
    } else if (ctype_upper($data['password'])) {
        $error['password'] = 'Password must contain lowercase!';
    } else if (!preg_match('~[0-9]+~', $data['password'])) {
        $error['password'] = 'Password must contain number!';
    } else if (strlen($data['password']) < 8) {
        $error['password'] = 'Password must has minimum 8 characters!';
    }

    if (empty($data['confirm_password'])) {
        $error['confirm_password'] = 'Password is required!';
    } else if (!preg_match('/[A-Z]/', $data['confirm_password'])) {
        $error['confirm_password'] = 'Password must contain uppercase!';
    } else if (ctype_upper($data['confirm_password'])) {
        $error['confirm_password'] = 'Password must contain lowercase!';
    } else if (!preg_match('~[0-9]+~', $data['confirm_password'])) {
        $error['confirm_password'] = 'Password must contain number!';
    } else if (strlen($data['confirm_password']) < 8) {
        $error['confirm_password'] = 'Password must has minimum 8 characters!';
    } else if ($data['confirm_password'] != $data['password']) {
        $error['confirm_password'] = 'Password does not match!';
    }

    if (empty($data['phone_number'])) {
        $error['phone_number'] = 'Phone number is required!';
    } else if (strlen($data['phone_number']) < 10) {
        $error['phone_number'] = 'Invalid phone number';
    }

    if (empty($data['email'])) {
        $error['email'] = 'Email is required!';
    } else if (!is_email($data['email'])) {
        $error['email'] = 'Invalid email';
    }

    if (empty($data['address'])) {
        $error['address'] = 'Address is required!';
    }

    session_start();

    if (!$error) {
        include "conn.php";

        $psw = md5($data['password']);

        $sql = "INSERT INTO USER (username, password, access)
        VALUES ('{$data['username']}', '$psw', 'CUSTOMER')";

        if ($conn->query($sql) === TRUE) {
            $sql ="SELECT user_id FROM USER WHERE username = '{$data['username']}';";
            $result = $conn->query($sql);
            while ($row = mysqli_fetch_array($result)) {
                $user_id = $row["user_id"];
            }
            $sql = "INSERT INTO CUSTOMER (user_id, customer_name, phone_number, email, address)
            VALUES ({$user_id}, '{$data['name']}', '{$data['phone_number']}', '{$data['email']}', '{$data['address']}');";
            if (!$conn->query($sql)) {
                $_SESSION["error"] = "Error: " . $sql . "<br>" . $conn->error;
                $conn->close();
                header("location:index.php?page=error");  
            }

            $conn->close();
            ?>
            <script>
					
					window.alert('Register successfully!!');
					window.location.href = 'home.html';
			</script>
        <?php 
        } else {
            $_SESSION["error"] = "Error: " . $sql . "<br>" . $conn->error;
            $conn->close();
            header("location:index.php?page=error");       
        }
    } else {
        if (!empty($error['name'])) $_SESSION["error"] = $error['name'];
        else if (!empty($error['username'])) $_SESSION["error"] = $error['username'];
        else if (!empty($error['password'])) $_SESSION["error"] = $error['password'];
        else if (!empty($error['confirm_password'])) $_SESSION["error"] = $error['confirm_password'];
        else if (!empty($error['phone_number'])) $_SESSION["error"] = $error['phone_number'];
        else if (!empty($error['email'])) $_SESSION["error"] = $error['email'];
        else if (!empty($error['address'])) $_SESSION["error"] = $error['address'];
        header("location:index.php?page=error");
    }
}

?>
