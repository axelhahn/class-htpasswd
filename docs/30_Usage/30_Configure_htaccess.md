## Introduction

After generating a htpasswd file and/ or a htgroup file you need to add some configuration to your webserver to use them.

In the Apache httpd there are 2 common methods:

### Webservice config

Define a `<Location>` (or `<Directory>`) section where you add the basic authentification config.

```txt
<Location /demo>
    AuthType Basic
    AuthName "Restricted area"
    AuthUserFile /var/www/users/.htpasswd
    Require valid-user
</Location>
```

### File .htaccess

Especially on a shared hosting you maybe have not the ability to add a `<Location>` section to your webserver. But it is very common that hosters allow .htaccess files.

The hoster defined the override of "AuthConfig" (or more).

🌐 <https://httpd.apache.org/docs/current/mod/core.html#allowoverride>

Then you can put into the folder you want to protet the .htaccess file. There you put the same code as above. But you don't need the `<Location>` tags around.

All examples below are using the Apache webserver. Other webserver have different syntax. 

The given examples are just examples and aren't feature complete. Check the docs of your webserver as well.

## Allow all defined users

Add the following code to the .htaccess file of your webserver:

```txt
AuthType Basic
AuthName "Restricted area"
AuthUserFile /var/www/users/.htpasswd
Require valid-user
```

* AuthUserFile - the path to the htpasswd file. It is relative to server root ... so use the full path here.
* Require valid-user - this is the keyword: allow access for all users that are in the htpasswd file.

## Allow given users

You can define N users in the htpasswd but allow only a subset of them to access your webserver.

Pay attention to the last line above: `Require valid-user`is replaced by `Require user <user_1> <user_2>`.

```txt
AuthType Basic
AuthName "Restricted area"
AuthUserFile /var/www/users/.htpasswd
Require user anton berta
```

## Allow group members

If you defined a htgroup file containing its members you can reference a group behind the require keyword. This can be useful if you have a user admin where you want to administrate users and groups - and you don't want to change the webservice config when changing a membership.

Herefor you need to add the htgroup file to the webserver too.

Then add `Require group <groupname>`.

```txt
AuthType Basic
AuthName "Restricted area"
AuthUserFile /var/www/users/.htpasswd
AuthGroupFile /var/www/users/.htgroups
Require group admins
```

## Advanced configuration

### Allow a group and user

```txt
AuthType Basic
AuthName "Restricted area"
AuthUserFile /var/www/users/.htpasswd
AuthGroupFile /var/www/users/.htgroups
Require group admins
Require user jack
```

### Disallow a groupmember

If "fred" is in the group admin you can exclude him but allow all other admins:

```txt
AuthType Basic
AuthName "Restricted area"
AuthUserFile /var/www/users/.htpasswd
AuthGroupFile /var/www/users/.htgroups
Require group admins
Require not user fred
```

### Restrict by file

```txt
AuthType Basic
AuthName "Restricted area"
AuthUserFile /var/www/users/.htpasswd
AuthGroupFile /var/www/users/.htgroups

<Files *.htm>
Require group admins
</Files>

<Files *.csv>
Require group admins
Require user jack
</Files>
```

### Ask for login only on external network

The trick is to use the `RequireAny` section. In this section you can define a list if "local" ip addresses where no login is required. If the ip address is not in the list the user needs to login.

```txt
AuthType Basic
AuthName "Restricted area"
AuthUserFile /var/www/users/.htpasswd
AuthGroupFile /var/www/users/.htgroups

<RequireAny>
    Require ip 192.168.178.
    Require ip 127.
    Require ip ::1
    Require valid-user
</RequireAny>
```
