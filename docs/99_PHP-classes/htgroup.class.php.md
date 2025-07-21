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
 2025-07-21  v1.0 add flag nn list()
 ======================================================================

```

## 🔶 Properties

(none)

## 🔷 Methods

### 🔹 public __construct()

Constructor

Line [63](https://github.com/axelhahn/php-htpasswd/tree/main/src/htgroup.class.php#L63) (6 lines)

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

Line [196](https://github.com/axelhahn/php-htpasswd/tree/main/src/htgroup.class.php#L196) (12 lines)

**Return**: `bool`

**Parameters**: **1** (required: 1)

| Parameter | Type | Description
|--         |--    |--
| \<required\> $sGroup | `string` | group name to add

### 🔹 public debug()

Enable or disable debug mode

Line [94](https://github.com/axelhahn/php-htpasswd/tree/main/src/htgroup.class.php#L94) (4 lines)

**Return**: `void`

**Parameters**: **1** (required: 1)

| Parameter | Type | Description
|--         |--    |--
| \<required\> $bDebug | `bool` | new value of debug flag

### 🔹 public exists()

Check if a given group name exists
 It returns true if successful.
 It returns false if the group does not exist.

Line [217](https://github.com/axelhahn/php-htpasswd/tree/main/src/htgroup.class.php#L217) (5 lines)

**Return**: `bool`

**Parameters**: **1** (required: 1)

| Parameter | Type | Description
|--         |--    |--
| \<required\> $sGroup | `string` | groupname to search for

### 🔹 public generateContent()

Generate content for full htgroup file

Line [132](https://github.com/axelhahn/php-htpasswd/tree/main/src/htgroup.class.php#L132) (10 lines)

**Return**: `string`

**Parameters**: **0** (required: 0)

### 🔹 public list()

List all groups as array.
 with setting flag to show groupmembers you get an array
 with <group> as key and value is an array of groupmembers

Line [231](https://github.com/axelhahn/php-htpasswd/tree/main/src/htgroup.class.php#L231) (5 lines)

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

Line [246](https://github.com/axelhahn/php-htpasswd/tree/main/src/htgroup.class.php#L246) (11 lines)

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

Line [268](https://github.com/axelhahn/php-htpasswd/tree/main/src/htgroup.class.php#L268) (11 lines)

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

Line [291](https://github.com/axelhahn/php-htpasswd/tree/main/src/htgroup.class.php#L291) (12 lines)

**Return**: `bool`

**Parameters**: **2** (required: 2)

| Parameter | Type | Description
|--         |--    |--
| \<required\> $sGroup | `string` | groupname to update
| \<required\> $sNewGroup | `string` | new groupname

### 🔹 public setFile()

Set full path of htgroup file. If it exists its groups will be parsed.

Line [159](https://github.com/axelhahn/php-htpasswd/tree/main/src/htgroup.class.php#L159) (11 lines)

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

Line [319](https://github.com/axelhahn/php-htpasswd/tree/main/src/htgroup.class.php#L319) (10 lines)

**Return**: `bool`

**Parameters**: **2** (required: 2)

| Parameter | Type | Description
|--         |--    |--
| \<required\> $sUser | `string` | 
| \<required\> $sGroup | `string` | 

### 🔹 public userRemove()

Add a user to an existing group
 It returns true if successful.
 It returns false
 - if group doesn't exist
 - if the user in the given group doesn't exist
 - writing .htgroup file failed

Line [342](https://github.com/axelhahn/php-htpasswd/tree/main/src/htgroup.class.php#L342) (16 lines)

**Return**: `bool`

**Parameters**: **2** (required: 2)

| Parameter | Type | Description
|--         |--    |--
| \<required\> $sUser | `string` | 
| \<required\> $sGroup | `string` | 

---
Generated with [Axels PHP class doc parser](https://github.com/axelhahn/php-classdoc)
