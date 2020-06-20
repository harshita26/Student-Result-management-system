<?php
include('db.php');
session_start();
if(session_destroy()){
    header("Location: login.php");
    ?>
    <script>alert("Logout successful!");</script>
    <?php
}
?>