## Class axelhahn\htpasswd

```txt

```

## Properties

(none)

## Methods

### public __construct

Constructor

**Parameters**: **1** (required: 0)

| Parameter | Type | Description
|--         |--    |--
\<optional\> string $sHtPasswdFile = '' | string | optional: full path of htpasswd file


**Return**: 

### public add

Add a new user in htpasswd file.
It returns true if successful.
It returns false
- if user already exists
- writing .htpasswd file failed

**Parameters**: **2** (required: 2)

| Parameter | Type | Description
|--         |--    |--
\<required\> string $sUser | string | username to add
\<required\> string $sPassword | string | password to encrypt


**Return**: bool

### public debug

Enable or disable debug mode

**Parameters**: **1** (required: 1)

| Parameter | Type | Description
|--         |--    |--
\<required\> bool $bDebug | bool | new value of debug flag


**Return**: void

### public exists

Check if a given username exists
It returns true if successful.
It returns false if the user does not exist.

**Parameters**: **1** (required: 1)

| Parameter | Type | Description
|--         |--    |--
\<required\> string $sUser | string | username to search for


**Return**: bool

### public generateContent

Generate content for full htpasswd file

**Parameters**: **0** (required: 0)


**Return**: string

### public list

List all users as array.
You get the <username> as key. The value is a hash with key "pwhash"

**Parameters**: **0** (required: 0)


**Return**: array

### public remove

Remove an existing user
It returns true if successful.
It returns false
- if user doesn't exist
- writing .htpasswd file failed

**Parameters**: **1** (required: 1)

| Parameter | Type | Description
|--         |--    |--
\<required\> string $sUser | string | username to remove


**Return**: bool

### public setFile

Set full path of htpasswd file. If it exists its users will be parsed.

**Parameters**: **1** (required: 1)

| Parameter | Type | Description
|--         |--    |--
\<required\> string $sHtPasswdFile | string | optional: full path of htpasswd file


**Return**: void

### public update

Update password of an existing user
It returns true if successful.
It returns false
- if user doesn't exist
- if given old password doesn't match (old password is optional)
- writing .htpasswd file failed

**Parameters**: **3** (required: 2)

| Parameter | Type | Description
|--         |--    |--
\<required\> string $sUser | string | username to update
\<required\> string $sPassword | string | password
\<optional\> string $sOldPassword = '' | string | optional: old password that must match


**Return**: bool

### public verifyPassword

Verify password of an existing user
It returns true if successful.
It returns false
- if user doens't exist
- given password doesn't match

**Parameters**: **2** (required: 2)

| Parameter | Type | Description
|--         |--    |--
\<required\> string $sUser | string | username to check
\<required\> string $sPassword | string | password to verify


**Return**: bool



---
Generated with Axels PHP class doc parser.