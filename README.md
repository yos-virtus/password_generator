# password_generator
Simple package for generating passwords

## Usage examples

```
use Yos\PasswordGenerator\PasswordGeneratorService;

$characterSetsToUse = [
        'upper' => true,
        'numbers' => false,
        'symbols' => false
    ];

$passGen = new PasswordGeneratorService($characterSetsToUse);
```

`echo $passGen->generatePassword();`
will generate someshing like `lsUadztR`
`echo $passGen->generatePassword(12);`
makes it 12 character long `BnUXRsVFIfns`

Also 
```
$passGen->useNumbers();
echo $passGen->generatePassword(); //3hEiAinp
```
will mix it up with numbers and
```
$passGen->useSpecialCharacters()
echo $passGen->generatePassword(); // LNR&AiBg
```
adds special characters

