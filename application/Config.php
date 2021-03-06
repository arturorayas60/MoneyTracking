<?php  
/**
 * config.php
 *
 * @author Arturo Adonay Rayas Vergara <arturorayas60@gmail.com>
 */

 /**
  *se definen todos los parametros de configuracion del proyecto
  */
define("DEFAULT_CONTROLLER", "transactions");  
define("DEFAULT_LAYOUT", "default");

define("APP_FOLDER", "it101/MoneyTracking");
define("APP_URL", "http://".$_SERVER['SERVER_NAME']."/".APP_FOLDER."/");
define("APP_URL_CSS", APP_URL."public/css/");
define("APP_URL_IMG", APP_URL."public/img/");
define("APP_URL_JS", APP_URL."public/js/");

define("APP_NAME", "Framework");

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "money");
define("DB_CHAR", "UTF8");
?>
