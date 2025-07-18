# class-htpasswd

This PHP 8 class provides an easy way to manage htpasswd files.

After setting a htpasswd file you can
- add - a user and password
- exists - check if a given user exists
- list - list all uses
- remove - a user
- update - a user and password - optional after verifying the current password
- verify - a password of an existing user

---

Status: BETA

---

👤 Axel Hahn \
📄 Source: <https://github.com/axelhahn/class-htpasswd/> \
📜 Licence: GNU GPL 3 \
📗 Docs: TODO

## Usage

### Initialize class

We need to initialize the class.
Set a filename of the .htpasswd with full or relative path:

```php
require_once('../src/htpasswd.class.php');
$ht=new htpasswd('/var/www/users/.htpasswd');
```

### Add user

```php
if (!$ht->add('anton','antons-secret-password'){
    die("Failed");
}
echo "OK";
```

### update existing password

```php
if (!$ht->update('anton','antons-new-password'){
    die("Failed");
}
echo "OK";
```

### delete user entry

```php
if (!$ht->remove('anton'){
    die("Failed");
}
echo "OK, user was deleted";
```
