<?php

/**
 * DATABASE
 */
define("CONF_DB_HOST", "localhost");
define("CONF_DB_USER", "root");
define("CONF_DB_PASS", "");
define("CONF_DB_NAME", "estudos");


/**
 * DATE
 */
define('CONF_DATE_BR', 'America/Sao_Paulo');
define("CONF_DATE_FORMAT_DB", "Y/m/d H:i:s");
define("CONF_DATE_FORMAT", "Y/m/d");




/**
 * PASSWORD
 */
define("CONF_PASSWD_MIN_LEN", 8);
define("CONF_PASSWD_MAX_LEN", 16);
define("CONF_PASSWD_ALGO", PASSWORD_DEFAULT);
define("CONF_PASSWD_OPTION", ["cost" => 10]);