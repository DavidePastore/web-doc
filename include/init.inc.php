<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4:
+----------------------------------------------------------------------+
| PHP Documentation Tools Site Source Code                             |
+----------------------------------------------------------------------+
| Copyright (c) 1997-2004 The PHP Group                                |
+----------------------------------------------------------------------+
| This source file is subject to version 3.0 of the PHP license,       |
| that is bundled with this package in the file LICENSE, and is        |
| available through the world-wide-web at the following url:           |
| http://www.php.net/license/3_0.txt.                                  |
| If you did not receive a copy of the PHP license and are unable to   |
| obtain it through the world-wide-web, please send a note to          |
| license@php.net so we can mail you a copy immediately.               |
+----------------------------------------------------------------------+
| Authors:          Yannick Torres <yannick@php.net>                   |
|                   Mehdi Achour <didou@php.net>                       |
|                   Gabor Hojtsy <goba@php.net>                        |
|                   Sean Coates <sean@php.net>                         |
+----------------------------------------------------------------------+
$Id$
*/

error_reporting(E_ALL);

define('PATH_ROOT',  realpath(dirname(__FILE__) . '/../'));
define('SQLITE_DIR', PATH_ROOT . '/sqlite/');
define('CVS_DIR',    PATH_ROOT . '/cvs/');

// project & language config
require_once('lib_proj_lang.inc.php');

// get defaults
list($defaultProject)  = array_keys($PROJECTS);
list($defaultLanguage) = array_keys($LANGUAGES);

// set up constants (use defaults if necessary)
define('SITE',  isset($project)  ? $project  : $defaultProject);
define('LANGC', isset($language) ? $language : $defaultLanguage);
define('URI',   isset($uri)      ? $uri      : $_SERVER['REQUEST_URI']);
define('LANGD', $LANGUAGES[LANGC]);

// set up BASE_URL
if (substr($_SERVER['REQUEST_URI'], -1, 1) == '/') {
    // is a directory, use verbatim
    $baseURL = $_SERVER['REQUEST_URI'];
} else {
    // not a dir, use the dirname
    $baseURL = dirname($_SERVER['REQUEST_URI']);
}

// this very dirty fix makes /rfc work
$baseURL = str_replace('/rfc', '', $baseURL);

// actually define the constant (trim off any trailing slashes):
define('BASE_URL', rtrim($baseURL, '/'));

require_once('lib_general.inc.php');

?>