<?php
if (!isset($_SESSION['authenticated'])) {
    $_SESSION['status'] = "Please Login to Access User Dashboard";
    $_SESSION['status_text'] = " ";
    $_SESSION['status_code'] = "warning";
    $_SESSION['status_btn'] = "Back";
    header("Location: index");
    exit(0);
}


?>