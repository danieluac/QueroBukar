<?php
/**
 * @author Daniel U AC <antoniocordeiro228@gmail.com>
 * @requires file requires main files of this app
 */
require_once __DIR__.DIRECTORY_SEPARATOR."../app/autoload.php";
/**
 * @uses Kernel main class of the app
 */
use app\kernel\kernel;
/** 
 * this instance, serves for app start, and this file it's main of the app
 * @return OBJECT app return
 */
return new kernel();























