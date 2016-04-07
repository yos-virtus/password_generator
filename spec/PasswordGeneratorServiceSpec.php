<?php

namespace spec\Yos\PasswordGenerator;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PasswordGeneratorServiceSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith([
            'upper' => false,
            'numbers' => false,
            'symbols' => false
        ]);
        $this->shouldHaveType('Yos\PasswordGenerator\PasswordGeneratorService');
    }

    function it_must_be_a_string()
    {
        $this->generatePassword(8)->shouldBeString('/[a-z]{8}/');
    }

    function it_generates_password_of_a_given_length()
    {
        $this->generatePassword(10)->shouldMatch('/.{10}/');
    }

    function it_generates_password_of_a_given_length_with_uppercase_characters()
    {
        $this->useUppercase()->generatePassword(8)->shouldMatch('/[A-Za-z]{8}/');
    }

    function it_generates_password_of_a_given_length_with_numbers()
    {
        $this->useNumbers()->generatePassword(8)->shouldMatch('/[a-z0-9]{8}/');
    }

    function it_generates_password_of_a_given_length_with_special_characters()
    {
        $this->useSpecialCharacters()->generatePassword(10)->shouldMatch('/[a-z\?\#\$\*\&\%\@\!\~\_\+\=]{10}/');
    }
}
