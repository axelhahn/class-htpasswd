## Initialize class

We need to initialize the class.
Set a filename of the .htpasswd with full or relative path:

```php
require_once('../src/htpasswd.class.php');
$oHtgroup=new htpasswd('/var/www/users/.htgroup');
```

## CRUD actions

### Add group

```php
if(!$oHtgroup->add('admins')){
    die("Failed");
}
if(!$oHtgroup->add('editors')){
    die("Failed");
}
echo "OK";
```

### List all groups

```php
print_r($oHtgroup->list());
```

... returns something like this:

```txt
Array
(
    [0] => admins
    [1] => editors
    ...
)
```

The method `list()` has a parameter for a flag to show groupmembers. If the flag is true, you get an array with <group> as key and value is an array of groupmembers:

```php
print_r($oHtgroup->list(true));
```

... returns something like this:

```txt
Array
(
    [admins] => Array
        (
            [1] => anton
            [2] => berta

        )
    ...
)
```

### Rename a group

```php
if (!$oHtgroup->rename('editors', 'moderators')){
    die("Failed");
}
echo "OK";
```

### Delete group

```php
if (!$oHtgroup->remove('moderators')){
    die("Failed");
}
echo "OK, group was deleted";
```

## User methods

### Add user to group

```php
$oHtgroup->userAdd('anton', 'admins');
$oHtgroup->userAdd('berta', 'admins');
```

### Remove user from group

```php
$oHtgroup->userRemove('anton', 'admins');
```


## More methods

### Check if group exists

```php
if ($oHtgroup->exists('admins')){
    echo "Group exists";
}
```

### List members

Next to `list()` there is also a `members()` method to list members of a given group.

```php
print_r($oHtgroup->members('admins'));
```

returns

```txt
Array
(
    [1] => anton
    [2] => berta
)
```

### Debugging

With a bool value you can enable or disable debug mode. 

```php
$oHtgroup->debug(true);
$oHtgroup->add('admins')
```

After enabling debugging you see debug info and why a method would return false.

```txt
DEBUG: axelhahn\htgroup::add(group 'admins')
DEBUG: axelhahn\htgroup::_groupExists(group 'admins')
DEBUG: axelhahn\htgroup::add: Adding group ...
DEBUG: axelhahn\htgroup::_saveFile()
DEBUG: axelhahn\htgroup::generateContent()
DEBUG: axelhahn\htgroup::generateContent: adding 1 group(s) ...
```

### Set a new file name

Yo can set a new full path of the .htpasswd file. It is not required that it exists. With using the 1st writing action the file will be created.

```php
$oHtgroup->setFile('/var/www/website_2/.htgroup');
```
