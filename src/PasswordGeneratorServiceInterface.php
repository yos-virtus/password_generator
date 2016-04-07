<?php 

namespace Yos\PasswordGenerator;

interface PasswordGeneratorServiceInterface
{
    public function generatePassword(int $length = 8);
    public function useUppercase();
    public function useNumbers();
    public function useSpecialCharacters();
}