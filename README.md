# Caesar Cipher Library

[![License](https://img.shields.io/badge/license-MIT-blue.svg)](https://github.com/ramazancetinkaya/caesar-cipher/blob/master/LICENSE)

A PHP library for encrypting and decrypting text using the Caesar Cipher algorithm.

## Caesar Cipher

In cryptography, a Caesar cipher, also known as Caesar's cipher, the shift cipher, Caesar's code, or Caesar shift, is one of the simplest and most widely known encryption techniques. It is a type of substitution cipher in which each letter in the plaintext is replaced by a letter some fixed number of positions down the alphabet. For example, with a left shift of 3, D would be replaced by A, E would become B, and so on. The method is named after Julius Caesar, who used it in his private correspondence.

## Usage

```php
// Create a CaesarCipher instance with a shift of 3
$caesarCipher = new CaesarCipher(3);

$plaintext = "Hello, World!";
$encryptedText = $caesarCipher->encrypt($plaintext);
$decryptedText = $caesarCipher->decrypt($encryptedText);

echo "Original Text: $plaintext\n";
echo "Encrypted Text: $encryptedText\n";
echo "Decrypted Text: $decryptedText\n";
```

## License

This project is licensed under the MIT License - see the LICENSE file for details.
