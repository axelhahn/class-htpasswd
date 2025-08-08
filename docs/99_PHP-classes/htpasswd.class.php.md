---
title: axelhahn\htpasswd
generator: Axels php-classdoc; https://github.com/axelhahn/php-classdoc
---

## 📦 Class axelhahn\htpasswd

```txt

 ======================================================================

 PHP class to handle htpasswd file

 After setting a htpasswd file you can
 - add - a user and password
 - update - a user and password - optional after verifying the current password
 - remove - a user
 - verify - a password of an existing user
 - check - if a given user exists

 @author www.axel-hahn.de
 @license GNU Public License 3.0
 @source https://github.com/axelhahn/php-htpasswd/

 ----------------------------------------------------------------------
 2025-07-18  initial version
 2025-07-21  v1.0
 2025-07-23  v1.1  update phpdoc
 2025-07-24  v1.2  add method getFile()
 2025-07-25  v1.3  fix readFile(); sort users before saving
 2025-08-08  v1.4  add a comment in 1st line; ignore lines starting with # or ; and fix update()
 2025-08-08  v1.5  add error() method to get the last error
 ======================================================================

```

## 🔶 Properties

(none)

## 🔷 Methods

### 🔹 public __construct()

Constructor

Line [70](https://github.com/axelhahn/php-htpasswd/tree/main/src/htpasswd.class.php#L70) (6 lines)

**Return**: `void`

**Parameters**: **1** (required: 0)

| Parameter | Type | Description
|--         |--    |--
| \<optional\> $sHtPasswdFile | `string` | optional: full path of htpasswd file

### 🔹 public add()

Add a new user in htpasswd file.
 It returns true if successful.
 It returns false
 - if user already exists
 - writing .htpasswd file failed

Line [250](https://github.com/axelhahn/php-htpasswd/tree/main/src/htpasswd.class.php#L250) (14 lines)

**Return**: `bool`

**Parameters**: **2** (required: 2)

| Parameter | Type | Description
|--         |--    |--
| \<required\> $sUser | `string` | username to add
| \<required\> $sPassword | `string` | password to encrypt

### 🔹 public debug()

Enable or disable debug mode

Line [115](https://github.com/axelhahn/php-htpasswd/tree/main/src/htpasswd.class.php#L115) (4 lines)

**Return**: `void`

**Parameters**: **1** (required: 1)

| Parameter | Type | Description
|--         |--    |--
| \<required\> $bDebug | `bool` | new value of debug flag

### 🔹 public error()

Get the last error

Line [125](https://github.com/axelhahn/php-htpasswd/tree/main/src/htpasswd.class.php#L125) (4 lines)

**Return**: `string`

**Parameters**: **0** (required: 0)

### 🔹 public exists()

Check if a given username exists
 It returns true if successful.
 It returns false if the user does not exist.

Line [273](https://github.com/axelhahn/php-htpasswd/tree/main/src/htpasswd.class.php#L273) (5 lines)

**Return**: `bool`

**Parameters**: **1** (required: 1)

| Parameter | Type | Description
|--         |--    |--
| \<required\> $sUser | `string` | username to search for

### 🔹 public generateContent()

Generate content for full htpasswd file
 This method is used internally in the _saveFile() method.
 You can use this to render a preview of the generated file.

Line [172](https://github.com/axelhahn/php-htpasswd/tree/main/src/htpasswd.class.php#L172) (11 lines)

**Return**: `string`

**Parameters**: **0** (required: 0)

### 🔹 public getFile()

Get current htpasswd file

Line [219](https://github.com/axelhahn/php-htpasswd/tree/main/src/htpasswd.class.php#L219) (4 lines)

**Return**: `string`

**Parameters**: **0** (required: 0)

### 🔹 public list()

List all users as array.
 You get the <username> as key. The value is a hash with key "pwhash"

Line [285](https://github.com/axelhahn/php-htpasswd/tree/main/src/htpasswd.class.php#L285) (5 lines)

**Return**: `array`

**Parameters**: **0** (required: 0)

### 🔹 public remove()

Remove an existing user
 It returns true if successful.
 It returns false
 - if user doesn't exist
 - writing .htpasswd file failed

Line [301](https://github.com/axelhahn/php-htpasswd/tree/main/src/htpasswd.class.php#L301) (11 lines)

**Return**: `bool`

**Parameters**: **1** (required: 1)

| Parameter | Type | Description
|--         |--    |--
| \<required\> $sUser | `string` | username to remove

### 🔹 public setFile()

Set full path of htpasswd file. If it exists its users will be parsed.

Line [205](https://github.com/axelhahn/php-htpasswd/tree/main/src/htpasswd.class.php#L205) (9 lines)

**Return**: `void`

**Parameters**: **1** (required: 1)

| Parameter | Type | Description
|--         |--    |--
| \<required\> $sHtPasswdFile | `string` | optional: full path of htpasswd file

### 🔹 public update()

Update password of an existing user
 It returns true if successful.
 It returns false
 - if user doesn't exist
 - if given old password doesn't match (old password is optional)
 - writing .htpasswd file failed

Line [326](https://github.com/axelhahn/php-htpasswd/tree/main/src/htpasswd.class.php#L326) (24 lines)

**Return**: `bool`

**Parameters**: **3** (required: 2)

| Parameter | Type | Description
|--         |--    |--
| \<required\> $sUser | `string` | username to update
| \<required\> $sPassword | `string` | password
| \<optional\> $sOldPassword | `string` | optional: old password that must match

### 🔹 public verifyPassword()

Verify password of an existing user
 It returns true if successful.
 It returns false
 - if user doens't exist
 - given password doesn't match

Line [362](https://github.com/axelhahn/php-htpasswd/tree/main/src/htpasswd.class.php#L362) (15 lines)

**Return**: `bool`

**Parameters**: **2** (required: 2)

| Parameter | Type | Description
|--         |--    |--
| \<required\> $sUser | `string` | username to check
| \<required\> $sPassword | `string` | password to verify

---
Generated with [Axels PHP class doc parser](https://github.com/axelhahn/php-classdoc)
