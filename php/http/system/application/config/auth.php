<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['auth']['mode'] = "mysql";
$config['auth']['apache'] = TRUE;
$config['auth']['apache_restart_cmd'] = "apache2ctl restart";
$config['auth']['htpasswd_fname'] = "/var/git/gus/php/auth/gus.passwd";

