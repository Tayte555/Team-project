<?php
function login($connection){
    if(isset($_SESSION['user_id'])){
        $id = $_SESSION['user_id'];
        $query = "select * from users where user_id = '$id' limit 1";

        $result = mysqli_query($connection,$query);
        if($result && mysqli_num_rows($result) > 0){
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
    header("Location: login.php");
    die;
}
?>