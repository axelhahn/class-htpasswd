<?php
chdir(__DIR__);
$oHtpasswdpasswdfile='demo-htpasswd.txt';

// ----------------------------------------------------------------------
// MAIN
// ----------------------------------------------------------------------

require_once('inc_functions.php');
require_once('../src/htpasswd.class.php');
$oHtpasswd=new axelhahn\htpasswd();

echo "

########## TEST SCRIPT FOR htpasswd.class.php ##########

";

section("Enabling debug mode ... ");
$oHtpasswd->debug(true);

section("Setting demo htpasswd file '$oHtpasswdpasswdfile'");
$oHtpasswd->setFile($oHtpasswdpasswdfile);

section("Add user 'anton'");
echo ($oHtpasswd->add('anton','anton123') ? '✅ true' : '❌ false') .PHP_EOL;

section("This should be stopped: add the same user again");
echo ($oHtpasswd->add('anton','amton123') ? '❌ true' : '✅ false') .PHP_EOL;

section("Content of '$oHtpasswdpasswdfile'");
echo file_get_contents($oHtpasswdpasswdfile);

section("Add user 'berta'");
echo ($oHtpasswd->add('berta','berta123') ? '✅ true' : '❌ false') .PHP_EOL;

section("Content of '$oHtpasswdpasswdfile'");
echo file_get_contents($oHtpasswdpasswdfile);

section("list users");
print_r($oHtpasswd->list());

section("Created user exists 'anton'?");
echo ($oHtpasswd->exists('anton') ? '✅ true' : '❌ false') .PHP_EOL;

section("Not created user exists 'fred'");
echo ($oHtpasswd->exists('fred') ? '❌ true' : '✅ false') .PHP_EOL;

section("Verify a correct password");
echo ($oHtpasswd->verifyPassword('anton', 'anton123') ? '✅ true' : '❌ false') .PHP_EOL;

section("Verify a wrong password");
echo ($oHtpasswd->verifyPassword('anton', 'wrongpassword') ? '❌ true' : '✅ false') .PHP_EOL;

section("Verify a wrong password of a non existing user");
echo ($oHtpasswd->verifyPassword('fred', 'wrongpassword') ? '❌ true' : '✅ false') .PHP_EOL;

section("Remove existing user 'anton'");
echo ($oHtpasswd->remove('anton') ? '✅ true' : '❌ false') .PHP_EOL;

section("Content of '$oHtpasswdpasswdfile'");
echo file_get_contents($oHtpasswdpasswdfile);

section("Remove non existing user 'fred'");
echo ($oHtpasswd->remove('fred') ? '❌ true' : '✅ false') .PHP_EOL;

section("Cleanup & exit");
unlink($oHtpasswdpasswdfile);
echo PHP_EOL;

// ----------------------------------------------------------------------
