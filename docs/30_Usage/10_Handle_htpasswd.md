## Initialize class

We need to initialize the class.
Set a filename of the .htpasswd with full or relative path:

```php
require_once('../src/htpasswd.class.php');
$oHtpasswd=new htpasswd('/var/www/users/.htpasswd');
```

## CRUD actions

### Add user

```php
if (!$oHtpasswd->add('anton','antons-secret-password'){
    die("Failed");
}
if (!$oHtpasswd->add('berta','bertas-secret-password'){
    die("Failed");
}
echo "OK";
```

### List all users

```php
print_r($oHtpasswd->list());
```

... returns something like this:

```txt
Array
(
    [anton] => Array
        (
            [pwhash] => $2y$12$NCeDta6hPIBZhZCqk8sU9exB16j/m8mIRN2OySuWz2FVwlhmLWkey
        )

    [berta] => Array
        (
            [pwhash] => $2y$12$zEldMcliehpfYXawUW8evebVyhNlYR5R4DlCxD/WPK6DReKSorsMO
        )

)
```

### Update existing password

```php
if (!$oHtpasswd->update('anton','antons-new-password'){
    die("Failed");
}
echo "OK";
```

There is a 3rd param for the old param.
If the old password is given, the password update will be performed only if the old password matches.

### Delete user entry

```php
if (!$oHtpasswd->remove('anton'){
    die("Failed");
}
echo "OK, user was deleted";
```

## More methods

### Check if user exists

```php
if ($oHtpasswd->exists('anton')){
    echo "User exists";
}
```

### Verify password

```php
if ($oHtpasswd->verifyPassword('anton','antons-secret-password')){
    echo "Password is correct";
}
```

### Debugging

With a bool value you can enable or disable debug mode. 

```php
$oHtpasswd->debug(true);
$oHtpasswd->add('anton','antons-secret-password');
echo PHP_EOL;
$oHtpasswd->add('anton','antons-secret-password');
```

After enabling debugging you see debug info and why a method would return false.

```txt
DEBUG: axelhahn\htpasswd::add(user 'anton', password '**********')
DEBUG: axelhahn\htpasswd::_UserExists(user 'anton')
DEBUG: axelhahn\htpasswd::add: Adding user ...
DEBUG: axelhahn\htpasswd::_saveFile()
DEBUG: axelhahn\htpasswd::generateContent()
DEBUG: axelhahn\htpasswd::generateContent: adding 1 user(s) ...

DEBUG: axelhahn\htpasswd::add(user 'anton', password '**********')
DEBUG: axelhahn\htpasswd::_UserExists(user 'anton')
DEBUG: axelhahn\htpasswd::add: Cannot add user 'anton', user already exists
```

### Set a new file name

Yo can set a new full path of the .htpasswd file. It is not required that it exists. With using the 1st writing action the file will be created.

```php
$oHtpasswd->setFile('/var/www/website_2/.htpasswd');
```
