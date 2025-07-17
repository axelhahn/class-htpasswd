<?php

class htpasswd
{

    // ----------------------------------------------------------------------
    // vars
    // ----------------------------------------------------------------------

    /**
     * Full path of htaccess file
     * @var string
     */
    protected string $sHtAccessFile = '';

    /**
     * User array with the keys "user" and "pwhash"
     * @var array
     */
    protected array $aItems =[];


    /**
     * Flag: show debug infos?
     * @var bool
     */
    protected bool $bDebug = false;

    // ----------------------------------------------------------------------
    // constructor
    // ----------------------------------------------------------------------
    

    /**
     * Constructor
     * @param string $sHtAccessFile  optional: full path of htaccess file
     */
    public function __construct(string $sHtAccessFile='')
    {
        if($sHtAccessFile) {
            $this->setFile($sHtAccessFile);
        }
    }
    // ----------------------------------------------------------------------
    // methods
    // ----------------------------------------------------------------------

    /**
     * Write debug info; only if debugging was activated
     * 
     * @see debug()
     * 
     * @param string $sMessage
     * @return void
     */
    protected function _wd(string $sMessage):void
    {
        if($this->bDebug) {
            echo "DEBUG: $sMessage".PHP_EOL;
        }
    }

    /**
     * Enable or disable debug mode
     * 
     * @param bool $bDebug  new value of debug flag
     * @return void
     */
    public function debug(bool $bDebug):void
    {
        $this->bDebug = $bDebug;
    }

    // ----------------------------------------------------------------------
    // file methods
    // ----------------------------------------------------------------------

    /**
     * Read htaccess file and parse user data.
     * file data are put in local array
     * 
     * @return void
     */
    protected function _readFile()
    {
        $this->_wd(__METHOD__."()");
        $this->aItems=[];
        if(file_exists($this->sHtAccessFile)) {
            $this->_wd(__METHOD__.": file '$this->sHtAccessFile' exists - reading it");
            foreach( file($this->sHtAccessFile) as $line){
                $aTmp = explode(":", $line);
                $this->aItems[$aTmp[0]] = [
                    'pwhash' => $aTmp[1],
                ];
            };
            $this->_wd(__METHOD__.": found ".count($this->aItems)." user(s).");
        } else {            
            $this->_wd(__METHOD__.": file '$this->sHtAccessFile' does not exist yet.");
        }
    }

    /**
     * Generate content for full htaccess file
     * 
     * @return string
     */
    public function generateContent():string
    {
        $this->_wd(__METHOD__."()");
        $sContent = '';
        $this->_wd(__METHOD__.": adding ".count($this->aItems)." user(s) ...");
        foreach($this->aItems as $sUser=>$aItem) {
            $sContent.=$sUser.":".$aItem['pwhash']."\n";
        }
        return $sContent;
    }

    /**
     * Save htaccess file. It returns true if successful
     * @return bool
     */
    protected function _saveFile(){
        $this->_wd(__METHOD__."()");
        return !!file_put_contents($this->sHtAccessFile, $this->generateContent());
    }

    /**
     * Set full path of htaccess file. If it exists its users will be parsed.
     * 
     * @param string $sHtAccessFile  optional: full path of htaccess file
     * @return void
     */
    public function setFile(string $sHtAccessFile):void
    {
        $this->_wd(__METHOD__."(file '$sHtAccessFile')");
        if($sHtAccessFile !== $this->sHtAccessFile) {
            $this->_wd(__METHOD__.": file exists");
            $this->sHtAccessFile = $sHtAccessFile;
            $this->_readFile();
        }
    }

    // ----------------------------------------------------------------------
    // user methods
    // ----------------------------------------------------------------------

    /**
     * Check if a given user exists
     * @param string $sUser  username
     * @return bool
     */
    protected function _UserExists(string $sUser):bool
    {
        $this->_wd(__METHOD__."(user '$sUser')");
        return isset($this->aItems[$sUser]); 
    }

    /**
     * Add a new user in htaccess file
     * 
     * @param string $sUser      username to add
     * @param string $sPassword  password
     * @return bool
     */
    public function add(string $sUser, string $sPassword):bool
    {
        $this->_wd(__METHOD__."(user '$sUser', password '**********')");
        if($this->_UserExists($sUser)) {
            $this->_wd(__METHOD__.": Cannot add user '$sUser', user already exists");
            return false;
        }

        $this->_wd(__METHOD__.": Adding user ...");
        $this->aItems[$sUser]=[            
            'pwhash' => password_hash($sPassword, PASSWORD_BCRYPT),
        ];
        return $this->_saveFile();
    }

    /**
     * Check if a given username exists
     * 
     * @param string $sUser      username
     * @return bool
     */
    public function exists(string $sUser):bool
    {
        $this->_wd(__METHOD__."(user '$sUser')");
        return $this->_UserExists($sUser);
    }

    /**
     * Remove an existing user
     * @param string $sUser      username to remove
     * @return bool
     */
    public function remove(string $sUser):bool
    {
        $this->_wd(__METHOD__."(user '$sUser')");
        if(!$this->_UserExists($sUser)) {
            $this->_wd(__METHOD__.": Cannot remove user '$sUser' - it does not exist.");
            return false;
        }

        unset($this->aItems[$sUser]);
        return $this->_saveFile();
    }
 
    /**
     * Update password of an existing user
     * 
     * @param string $sUser         username to update
     * @param string $sPassword     password
     * @param string $sOldPassword  optional: old password that must match
     * @return bool
     */
    public function update(string $sUser, string $sPassword, string $sOldPassword=''):bool
    {
        $this->_wd(__METHOD__."(user '$sUser', password '**********', old password ".($sOldPassword ? "**********" : "not set").")");
        if(!$this->_UserExists($sUser)) {
            $this->_wd(__METHOD__.": Cannot update password for '$sUser', user does not exist.");
            return false;
        }

        if($sOldPassword){
            if(!password_verify($sOldPassword, $this->aItems[$sUser]['pwhash'])){
                $this->_wd(__METHOD__.": Old password does not match");
                return false;
            }
            $this->_wd(__METHOD__.": Old password matches");
        } else {
            $this->_wd(__METHOD__.": No password to verify was given");
        }

        $this->_wd(__METHOD__.": Updating password of given user ...");
        $this->aItems[] = [
            'user' => $sUser,
            'pwhash' => password_hash($sPassword, PASSWORD_BCRYPT),
        ];
        return $this->_saveFile();
    }

    /**
     * Verify password of an existing user
     * 
     * @param string $sUser         username to check
     * @param string $sPassword     password to verify
     * @return bool
     */
    public function verifyPassword(string $sUser, string $sPassword):bool
    {
        $this->_wd(__METHOD__."(user '$sUser', password '**********')");
        if(!$this->_UserExists($sUser)) {
            $this->_wd(__METHOD__.": Cannot verify - user '$sUser' does not exist");
            return false;
        }
        if (password_verify($sPassword, $this->aItems[$sUser]['pwhash'])){
            $this->_wd(__METHOD__.": Password matches");
            return true;
        } else {
            $this->_wd(__METHOD__.": Password does not match");
            return false;
        }
    }

}