<?php

//Define Configuration for connection to database
define("DB_HOST", "localhost");
define("DB_NAME", "enchanted");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_PORT", 3306);

//Define constants
define("DEVELOPER1", "KRITIKA");
define("DEVELOPER2", "JIMESH");
define("DEVELOPER_ID1", "300345156");
define("DEVELOPER_ID2", "300327631");

//Log errors
define("LOGFILE", "log/error_log.txt");
ini_set("log_errors", true);
ini_set("error_log", LOGFILE)
?>