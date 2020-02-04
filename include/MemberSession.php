<?php

        include_once('../../common.php');
	session_save_path("../../data/session/");
	session_start();
	$userid = $_SESSION['ss_mb_id'];

        if (!$userid) {
		print "<script>location.href='/bbs/login.php'</script>";
#			goto_url(G5_BBS_URL."/login.php");
        }



?>
