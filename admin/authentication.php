<?php
if(isset($_SESSION['loggedIn'])){
    $username = validate($_SESSION['loggedInUser']['username']);

    $query = "SELECT * FROM admin WHERE username = '$username' LIMIT 1";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) == 0){
        logoutSession();
        $_SESSION['status'] = 'Access Denied!';
        $_SESSION['alertType'] = 'danger';
        redirect('../login.php', 'Access Denied!');
    }else{
        $row = mysqli_fetch_assoc($result);
        $storePos = $row['visiting_ID'];
        if($storePos == 1){
            $admin = true;
        }else{
            $admin = false;
            $_SESSION['status'] = 'Admin Only!';
            $_SESSION['alertType'] = 'warning';
            redirect('../login.php', 'Admin Only!');
        }
    }
}else{
    $_SESSION['status'] = 'Login to continue...';
    $_SESSION['alertType'] = 'warning';
    redirect('../login.php', 'Login to continue...');
}
?>
