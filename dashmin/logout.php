<?php
session_start();
session_unset();
echo "<script>
alert('logged out');
location.assign('../malefashion/index.php');
</script>";
?>