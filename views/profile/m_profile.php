<?php
if ($act=="edit") {
    include 'views/profile/profile_form.php';
}
elseif ($act=="update") {
    include 'views/profile/profile_update.php';
}
else {
    include 'views/profile/myprofile.php';
}
?>