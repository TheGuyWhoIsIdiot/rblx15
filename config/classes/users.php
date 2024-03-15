<?php
// handle auth and profiles
class users
{
    public static function generatePassword($givenText)
    {
        return password_hash($givenText, PASSWORD_DEFAULT);
    }

    public static function comparePassword($givenText, $user)
    {
        // until there is a MySQL PDO db statement, it stays like this
        $hash = "sdfghjsdfahj";
        $pass = self::generatePassword($givenText);
        if ($hash != $pass)
        {
            return false; // incorrect password
        }
        return true; // correct password
    }


public static function getUserInformation()
{    
    // until there is a MySQL PDO db statement, it stays like this   
    return array(
        "username" => "John Doe",
        "status" => "haxxing roblox hq rn!!!",
        "description" => "real john doe here.",
        "membership" => "OBC",
        "items" => array(
            "Hat" => 7,
            "la john doe" => 7,
        )
        );
}
  
  
}