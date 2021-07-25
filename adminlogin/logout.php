<?php
    session_start();
    session_destroy();
    header('Location: ../mainpage/index.html');
?>