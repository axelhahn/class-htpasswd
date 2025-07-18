<?php

$htaccessfile='demo-htaccess.txt';

// ----------------------------------------------------------------------
// FUNCTIONS
// ----------------------------------------------------------------------

/**
 * write a section header
 * @param string $sTitle  section title
 * @return void
 */
function section($sTitle){
    echo "
---> $sTitle".PHP_EOL;
}

// ----------------------------------------------------------------------
// MAIN
// ----------------------------------------------------------------------

require_once('../src/htpasswd.class.php');
$ht=new htpasswd();

echo "

########## TEST SCRIPT FOR htpasswd.class.php ##########

";

section("Enabling debug mode ... ");
$ht->debug(true);

section("Setting demo htaccess file '$htaccessfile'");
$ht->setFile($htaccessfile);

section("Add user 'anton'");
echo ($ht->add('anton','anton123') ? '✅ true' : '❌ false') .PHP_EOL;

section("This should be stopped: add the same user again");
echo ($ht->add('anton','amton123') ? '❌ true' : '✅ false') .PHP_EOL;

section("Content of '$htaccessfile'");
echo file_get_contents($htaccessfile);

section("Add user 'berta'");
echo ($ht->add('berta','berta123') ? '✅ true' : '❌ false') .PHP_EOL;

section("Content of '$htaccessfile'");
echo file_get_contents($htaccessfile);

section("list users");
print_r($ht->list());

section("Created user exists 'anton'?");
echo ($ht->exists('anton') ? '✅ true' : '❌ false') .PHP_EOL;

section("Not created user exists 'fred'");
echo ($ht->exists('fred') ? '❌ true' : '✅ false') .PHP_EOL;

section("Verify a correct password");
echo ($ht->verifyPassword('anton', 'anton123') ? '✅ true' : '❌ false') .PHP_EOL;

section("Verify a wrong password");
echo ($ht->verifyPassword('anton', 'wrongpassword') ? '❌ true' : '✅ false') .PHP_EOL;

section("Verify a wrong password of a non existing user");
echo ($ht->verifyPassword('fred', 'wrongpassword') ? '❌ true' : '✅ false') .PHP_EOL;

section("Remove existing user 'anton'");
echo ($ht->remove('anton') ? '✅ true' : '❌ false') .PHP_EOL;

section("Content of '$htaccessfile'");
echo file_get_contents($htaccessfile);

section("Remove non existing user 'fred'");
echo ($ht->remove('fred') ? '❌ true' : '✅ false') .PHP_EOL;

section("Cleanup & exit");
unlink($htaccessfile);
echo PHP_EOL;

// ----------------------------------------------------------------------
