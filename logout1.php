<?php
session_start();
session_destroy(); // Clear the session
header("Location: login.html"); // Redirect to login page
exit;
