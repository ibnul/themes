<?php
/* 404 not found page, redirects to Home page. */
header("HTTP/1.1 301 Moved Permanently");
header("Location: ".get_bloginfo('url'));
exit();
?>
