<?php
session_start();
//注销session
$_SESSION = array();
session_destroy();
if (isset($_COOKIE['username'])) {
    setcookie("username", '', time()-42000, '/');
}

print("
           <script type='text/javascript'>
			location.href='index.php';
		</script>
                ");
?>
