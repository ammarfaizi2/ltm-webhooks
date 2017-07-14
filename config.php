<?php
define("BASEPATH", __DIR__);
define("BASEURL", "http".(isset($_SERVER['HTTPS']) ? "s" : "")."://".$_SERVER['HTTP_HOST']);

ini_set("display_errors", true);

error_reporting(-1);


$config['default_route'] = "index";
$config['default_method'] = "index";



$config['error_handler']['show_error_query'] = true;

$config['cookie_default_domain'] = null;

/**
 * Assets Configuration.
 */
$config['assets']['js']  = BASEURL . "/js";
$config['assets']['css'] = BASEURL . "/css";



/**
 * Router Configuration.
 */
$config['router']['manual_route'] = true;
$config['router']['automatic_route'] = false;
$config['router']['router_file'] = "";


/**
 * Database Configuration.
 */
$config['database']['driver']    = "mysql";
$config['database']['host']      = "localhost";
$config['database']['user']      = "debian-sys-maint";
$config['database']['pass']      = "";
$config['database']['port']      = "3306";
$config['database']['dbname']    = "icetea";

$config['smtp'] = [
            "host"=>"smtp.gmail.com",
            "port"=>587,
            "secure"=>"tls",
            "auth"=>true,
            "username"=>"crayner.system@gmail.com",
            "password"=>"triosemut123"
        ];