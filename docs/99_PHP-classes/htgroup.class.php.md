## Class axelhahn\htgroup

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
\<optional\> string $sHtGroupFile = '' | string | optional: full path of htgroup file


**Return**: 

### public add

Add a new group in htgroup file.
It returns true if successful.
It returns false
- if group already exists
- writing .htgroup file failed

**Parameters**: **1** (required: 1)

| Parameter | Type | Description
|--         |--    |--
\<required\> string $sGroup | string | group name to add


**Return**: bool

### public debug

Enable or disable debug mode

**Parameters**: **1** (required: 1)

| Parameter | Type | Description
|--         |--    |--
\<required\> bool $bDebug | bool | new value of debug flag


**Return**: void

### public exists

Check if a given group name exists
It returns true if successful.
It returns false if the group does not exist.

**Parameters**: **1** (required: 1)

| Parameter | Type | Description
|--         |--    |--
\<required\> string $sGroup | string | groupname to search for


**Return**: bool

### public generateContent

Generate content for full htgroup file

**Parameters**: **0** (required: 0)


**Return**: string

### public list

List all groups as array.
You get the <group> as key. The value is an array with groupmembers

**Parameters**: **0** (required: 0)


**Return**: array

### public members

List members of a given existing group
it returns
- an array of groupmembers if successful
- false if group doesn't exist

**Parameters**: **1** (required: 1)

| Parameter | Type | Description
|--         |--    |--
\<required\> string $sGroup | string | groupname


**Return**: array|bool

### public remove

Remove an existing group
It returns true if successful.
It returns false
- if group doesn't exist
- writing .htgroup file failed

**Parameters**: **1** (required: 1)

| Parameter | Type | Description
|--         |--    |--
\<required\> string $sGroup | string | groupname to remove


**Return**: bool

### public rename

Rename a group
It returns true if successful.
It returns false
- if group doesn't exist
- writing .htgroup file failed

**Parameters**: **2** (required: 2)

| Parameter | Type | Description
|--         |--    |--
\<required\> string $sGroup | string | groupname to update
\<required\> string $sNewGroup | string | new groupname


**Return**: bool

### public setFile

Set full path of htgroup file. If it exists its groups will be parsed.

**Parameters**: **1** (required: 1)

| Parameter | Type | Description
|--         |--    |--
\<required\> string $sHtGroupFile | string | optional: full path of htgroup file


**Return**: void

### public userAdd

Add a user to an existing group
It returns true if successful.
It returns false
- if group doesn't exist
- writing .htgroup file failed

**Parameters**: **2** (required: 2)

| Parameter | Type | Description
|--         |--    |--
\<required\> string $sUser | string | mixed $sUser
\<required\> string $sGroup | string | mixed $sGroup


**Return**: bool

### public userRemove

Add a user to an existing group
It returns true if successful.
It returns false
- if group doesn't exist
- if the user in the given group doesn't exist
- writing .htgroup file failed

**Parameters**: **2** (required: 2)

| Parameter | Type | Description
|--         |--    |--
\<required\> string $sUser | string | mixed $sUser
\<required\> string $sGroup | string | mixed $sGroup


**Return**: bool



---
Generated with Axels PHP class doc parser.