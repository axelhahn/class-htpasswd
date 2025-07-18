# class-htpasswd

This PHP 8 class provides an easy way to manage htpasswd files.

After setting a **.htpasswd** file you can

- add - a user and password
- exists - check if a given user exists
- list - list all uses
- remove - a user
- update - a user and password - optional after verifying the current password
- verify - a password of an existing user

There is a 2nd class to handle **.htgoups** file too. It can handle goups:
- add
- rename
- delete groups
- list all groups or members
... and memberships
- userAdd
- userRemove

---

Status: BETA

---

👤 Axel Hahn \
📄 Source: <https://github.com/axelhahn/class-htpasswd/> \
📜 Licence: GNU GPL 3 \
📗 Docs: TODO

## Quick start :: htpasswd

### Initialize class

We need to initialize the class.
Set a filename of the .htpasswd with full or relative path:

```php
require_once('../src/htpasswd.class.php');
$oHtpasswd=new htpasswd('/var/www/users/.htpasswd');
```

### Add user

```php
if (!$oHtpasswd->add('anton','antons-secret-password'){
    die("Failed");
}
echo "OK";
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
