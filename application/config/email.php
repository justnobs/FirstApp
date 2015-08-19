<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config["protocol"]  = 'smtp';
$config["smtp_host"] = 'ssl://smtp.gmail.com';
$config["smtp_port"] = 465;
$config["smtp_user"] = 'joe.taylor@fatjoe.co.uk';
$config["smtp_pass"] = 'volletom88';
$config['charset'] = "utf-8";
$config['mailtype'] = "html";
$config['newline'] = "\r\n";

/*
$config["protocol"]  = 'smtp';
$config["smtp_host"] = 'ssl://fatjoe.co';
$config["smtp_port"] = 465;
$config["smtp_user"] = '';
$config["smtp_pass"] = '';
*/
/*$config= array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_port' => 465,
				'smtp_user' => 'mail_username',
				'smtp_pass' => 'mail_password'
			);
*/

?>