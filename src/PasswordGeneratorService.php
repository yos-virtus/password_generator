<?php 

namespace Yos\PasswordGenerator;

class PasswordGeneratorService implements PasswordGeneratorServiceInterface
{
    /**
     * Character set to build password on
     * 
     * @var sting
     */
    protected $characterSet = 'abcdefghijklmnopqrstuvwxyz';

    /**
     * @param array $characterSetsToUse
     */
    public function __construct(array $characterSetsToUse)
    {
        if($characterSetsToUse['upper'] === true)
            $this->characterSet .= implode(range('A', 'Z'));
        if($characterSetsToUse['numbers'] === true)
            $this->characterSet .= implode(range('0', '9'));
        if($characterSetsToUse['symbols'] === true)
            $this->characterSet .= '?#$*&%@!~_+=';
    }    

    /**
     * Make uppercase characters available in generation of password
     * 
     * @return object
     */
    public function useUppercase()
    {
        $this->attachCharacterSet(implode(range('A', 'Z')));
        return $this;
    }

    /**
     * Make numbers available in generation of password
     * 
     * @return object
     */
    public function useNumbers()
    {
        $this->attachCharacterSet(implode(range('0', '9')));
        return $this;
    }

    /**
     * Make special characters available in generation of password
     * 
     * @return object
     */
    public function useSpecialCharacters()
    {
        $this->attachCharacterSet('?#$*&%@!~_+=');
        return $this;
    }

    /**
     * Attach arbitrary characters set to basis
     * 
     * @param  string $characterSet
     */
    protected function attachCharacterSet(string $characterSetToAttach)
    {
        $charSetString = $this->characterSet . $characterSetToAttach;

        $this->characterSet = $this->removeDublicateChars($charSetString);
    }

    /**
     * Remove duplicate characters from a string 
     *  
     * @param  string
     * @return string
     */
    protected function removeDublicateChars(string $string)
    {
        return count_chars($string, 3);
    }

    /**
     * Pluck random character from character set
     * 
     * @return char
     */
    protected function getRandomCharacter()
    {
        $randomIndex = mt_rand(0, strlen($this->characterSet) - 1);
        return $this->characterSet[$randomIndex];
    }

    /**
     * Generate password of a given length
     * 
     * @param  int $length 
     * @return string              
     */
    public function generatePassword(int $length = 8)
    {
        $passwordString = '';

        for ($i=0; $i < $length; $i++) { 
            $passwordString .= $this->getRandomCharacter();
        }

        return $passwordString;
    }
}
