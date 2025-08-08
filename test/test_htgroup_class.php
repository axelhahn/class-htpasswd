<?php
chdir(__DIR__);
$oHtgroupgroupfile='demo-htgroup.txt';

// ----------------------------------------------------------------------
// MAIN
// ----------------------------------------------------------------------

require_once('inc_functions.php');
require_once('../src/htgroup.class.php');
$oHtgroup=new axelhahn\htgroup();

echo "

########## TEST SCRIPT FOR htgroup.class.php ##########

";

section("Enabling debug mode ... ");
$oHtgroup->debug(true);

section("Setting demo htaccess file '$oHtgroupgroupfile'");
$oHtgroup->setFile($oHtgroupgroupfile);

section("Add group 'admins'");
echo ($oHtgroup->add('admins') ? '✅ true' : '❌ false') .PHP_EOL;

section("Add group 'editors'");
echo ($oHtgroup->add('editors') ? '✅ true' : '❌ false') .PHP_EOL;

section("Content of '$oHtgroupgroupfile'");
echo file_get_contents($oHtgroupgroupfile);

section("This should be stopped: add the same user again");
echo ($oHtgroup->add('admins') ? '❌ true' : '✅ false') .PHP_EOL;
echo "\$oHtgroup->error() returns: " . $oHtgroup->error() .PHP_EOL;

section("list groups");
print_r($oHtgroup->list());


section("rename group");
echo ($oHtgroup->rename('editors', 'moderators')  ? '✅ true' : '❌ false') .PHP_EOL;

section("Content of '$oHtgroupgroupfile'");
echo file_get_contents($oHtgroupgroupfile);

section("remove group");
echo ($oHtgroup->remove('moderators')  ? '✅ true' : '❌ false') .PHP_EOL;

section("Content of '$oHtgroupgroupfile'");
echo file_get_contents($oHtgroupgroupfile);


section("add user anton to group 'admins'");
echo ($oHtgroup->userAdd('anton', 'admins')  ? '✅ true' : '❌ false') .PHP_EOL;

section("add user 'berta' to group 'admins'");
echo ($oHtgroup->userAdd('berta', 'admins')  ? '✅ true' : '❌ false') .PHP_EOL;

section("Content of '$oHtgroupgroupfile'");
echo file_get_contents($oHtgroupgroupfile);

section("Re read file ... setting a dummy file first");
$oHtgroup->setFile($oHtgroupgroupfile.'-test');
section("Setting file $oHtgroupgroupfile");
$oHtgroup->setFile($oHtgroupgroupfile);
section("parsed list after reading htgroups file:");
print_r($oHtgroup->list());

section("Members of group 'admins':");
print_r($oHtgroup->members('admins'));

section("Remove 'anton' from 'admins':");
echo ($oHtgroup->userRemove('anton', 'admins')  ? '✅ true' : '❌ false') .PHP_EOL;
echo file_get_contents($oHtgroupgroupfile);

section("Remove non existing user 'fred' from 'admins':");
echo ($oHtgroup->userRemove('fred', 'admins')  ? '❌ true' : '✅ false') .PHP_EOL;
echo "\$oHtgroup->error() returns: " . $oHtgroup->error() .PHP_EOL;

section("Cleanup & exit");
unlink($oHtgroupgroupfile);
echo PHP_EOL;

// ----------------------------------------------------------------------
