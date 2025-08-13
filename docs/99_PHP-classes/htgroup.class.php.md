---
title: axelhahn\htgroup
generator: Axels php-classdoc; https://github.com/axelhahn/php-classdoc
---

## 📦 Class axelhahn\htgroup

```txt

 ======================================================================

 PHP class to handle htgroup file

 This class can can handle .htgoups files:
 - add groups
 - rename
 - delete groups
 - list all groups or members
 ... and memberships
 - userAdd
 - userRemove

 @author www.axel-hahn.de
 @license GNU Public License 3.0
 @source https://github.com/axelhahn/php-htpasswd/

 ----------------------------------------------------------------------
 2025-07-19  initial version
 2025-07-21  v1.0  add flag nn list()
 2025-07-23  v1.1  update phpdoc
 2025-07-24  v1.2  add method getFile()
 2025-07-25  v1.3  fix readFile(); sort groups before saving
 2025-08-08  v1.4  add a comment in 1st line; ignore lines starting with # or ;
 2025-08-08  v1.5  add error() method to get the last error
 2025-08-12  v1.6  extend ht-base class
 ======================================================================

```

## 🔶 Properties

(none)

## 🔷 Methods

### 🔹 public __construct()

Constructor

Line [64](https://github.com/axelhahn/php-htpasswd/tree/main/src/htgroup.class.php#L64) (6 lines)

**Return**: `void`

**Parameters**: **1** (required: 0)

| Parameter | Type | Description
|--         |--    |--
| \<optional\> $sHtGroupFile | `string` | optional: full path of htgroup file

### 🔹 public add()

Add a new group in htgroup file.
 It returns true if successful.
 It returns false
 - if group already exists
 - writing .htgroup file failed

Line [189](https://github.com/axelhahn/php-htpasswd/tree/main/src/htgroup.class.php#L189) (12 lines)

**Return**: `bool`

**Parameters**: **1** (required: 1)

| Parameter | Type | Description
|--         |--    |--
| \<required\> $sGroup | `string` | group name to add

### 🔹 public debug()

Enable or disable debug mode

Line [80](https://github.com/axelhahn/php-htpasswd/tree/main/src/htgroup.class.php#L80) (4 lines)

**Return**: `void`

**Parameters**: **1** (required: 1)

| Parameter | Type | Description
|--         |--    |--
| \<required\> $bDebug | `bool` | new value of debug flag

### 🔹 public error()

Get the last error

Line [90](https://github.com/axelhahn/php-htpasswd/tree/main/src/htgroup.class.php#L90) (4 lines)

**Return**: `string`

**Parameters**: **0** (required: 0)

### 🔹 public exists()

Check if a given group name exists
 It returns true if successful.
 It returns false if the group does not exist.

Line [210](https://github.com/axelhahn/php-htpasswd/tree/main/src/htgroup.class.php#L210) (5 lines)

**Return**: `bool`

**Parameters**: **1** (required: 1)

| Parameter | Type | Description
|--         |--    |--
| \<required\> $sGroup | `string` | groupname to search for

### 🔹 public generateContent()

Generate content for full htgroup file
 This method is used internally in the _saveFile() method.
 You can use this to render a preview of the generated file.

Line [112](https://github.com/axelhahn/php-htpasswd/tree/main/src/htgroup.class.php#L112) (11 lines)

**Return**: `string`

**Parameters**: **0** (required: 0)

### 🔹 public getFile()

Get current htgroup file

Line [159](https://github.com/axelhahn/php-htpasswd/tree/main/src/htgroup.class.php#L159) (4 lines)

**Return**: `string`

**Parameters**: **0** (required: 0)

### 🔹 public list()

List all groups as array.
 with setting flag to show groupmembers you get an array
 with <group> as key and value is an array of groupmembers

Line [224](https://github.com/axelhahn/php-htpasswd/tree/main/src/htgroup.class.php#L224) (5 lines)

**Return**: `array`

**Parameters**: **1** (required: 0)

| Parameter | Type | Description
|--         |--    |--
| \<optional\> $sShowMembers | `bool` | optional: show groupmembers; default: false

### 🔹 public members()

List members of a given existing group
 it returns
 - an array of groupmembers if successful
 - false if group doesn't exist

Line [239](https://github.com/axelhahn/php-htpasswd/tree/main/src/htgroup.class.php#L239) (11 lines)

**Return**: `array|bool`

**Parameters**: **1** (required: 1)

| Parameter | Type | Description
|--         |--    |--
| \<required\> $sGroup | `string` | groupname

### 🔹 public remove()

Remove an existing group
 It returns true if successful.
 It returns false
 - if group doesn't exist
 - writing .htgroup file failed

Line [261](https://github.com/axelhahn/php-htpasswd/tree/main/src/htgroup.class.php#L261) (11 lines)

**Return**: `bool`

**Parameters**: **1** (required: 1)

| Parameter | Type | Description
|--         |--    |--
| \<required\> $sGroup | `string` | groupname to remove

### 🔹 public rename()

Rename a group
 It returns true if successful.
 It returns false
 - if group doesn't exist
 - writing .htgroup file failed

Line [284](https://github.com/axelhahn/php-htpasswd/tree/main/src/htgroup.class.php#L284) (11 lines)

**Return**: `bool`

**Parameters**: **2** (required: 2)

| Parameter | Type | Description
|--         |--    |--
| \<required\> $sGroup | `string` | groupname to update
| \<required\> $sNewGroup | `string` | new groupname

### 🔹 public setFile()

Set full path of htgroup file. If it exists its groups will be parsed.

Line [145](https://github.com/axelhahn/php-htpasswd/tree/main/src/htgroup.class.php#L145) (9 lines)

**Return**: `void`

**Parameters**: **1** (required: 1)

| Parameter | Type | Description
|--         |--    |--
| \<required\> $sHtGroupFile | `string` | optional: full path of htgroup file

### 🔹 public userAdd()

Add a user to an existing group
 It returns true if successful.
 It returns false
 - if group doesn't exist
 - writing .htgroup file failed

Line [311](https://github.com/axelhahn/php-htpasswd/tree/main/src/htgroup.class.php#L311) (14 lines)

**Return**: `bool`

**Parameters**: **2** (required: 2)

| Parameter | Type | Description
|--         |--    |--
| \<required\> $sUser | `string` | username to add
| \<required\> $sGroup | `string` | group to add user to; this group must exist

### 🔹 public userRemove()

Add a user to an existing group
 It returns true if successful.
 It returns false
 - if group doesn't exist
 - if the user in the given group doesn't exist
 - writing .htgroup file failed

Line [338](https://github.com/axelhahn/php-htpasswd/tree/main/src/htgroup.class.php#L338) (16 lines)

**Return**: `bool`

**Parameters**: **2** (required: 2)

| Parameter | Type | Description
|--         |--    |--
| \<required\> $sUser | `string` | username to delete
| \<required\> $sGroup | `string` | group name where to delete the user from

---
Generated with [Axels PHP class doc parser](https://github.com/axelhahn/php-classdoc)
