<?php
session_start();
// unset($_SESSION['userEmail']);
session_unset();
echo "<script>
location.assign('index.php');
</script>";
?>