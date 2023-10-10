<?php
/**
 * Caesar Cipher Library
 *
 * This library provides robust functionality for encrypting and decrypting text using the Caesar Cipher algorithm.
 * The Caesar Cipher is a simple and historical substitution cipher that shifts characters by a fixed number
 * of positions, providing basic data encryption and decryption capabilities.
 *
 * @category   Encryption
 * @package    CaesarCipher
 * @author     Ramazan Çetinkaya
 * @version    1.0
 * @license    MIT License
 * @link       https://github.com/ramazancetinkaya/caesar-cipher
 *
 * This library allows you to:
 * - Encrypt plaintext with a user-defined shift value.
 * - Decrypt ciphertext with the same shift value.
 * - Handle both uppercase and lowercase letters while preserving non-alphabetic characters.
 */

class CaesarCipher
{
    private $shift; // Shift value for encryption/decryption

    /**
     * Constructor to initialize the shift value.
     *
     * @param int $shift The number of positions to shift characters.
     */
    public function __construct($shift)
    {
        // Validate shift value
        if (!is_int($shift) || $shift < 1 || $shift > 25) {
            throw new InvalidArgumentException("Shift value must be an integer between 1 and 25.");
        }

        $this->shift = $shift;
    }

    /**
     * Encrypts a given plaintext using the Caesar Cipher.
     *
     * @param string $plaintext The text to be encrypted.
     * @return string The encrypted text.
     */
    public function encrypt($plaintext)
    {
        // Validate input
        if (!is_string($plaintext)) {
            throw new InvalidArgumentException("Input must be a string.");
        }

        $encryptedText = '';

        // Iterate through each character in the plaintext
        for ($i = 0; $i < strlen($plaintext); $i++) {
            $char = $plaintext[$i];

            // Check if the character is alphabetic
            if (ctype_alpha($char)) {
                $isUppercase = ctype_upper($char);
                $char = strtolower($char);

                // Apply the Caesar Cipher shift
                $char = chr(((ord($char) - ord('a') + $this->shift) % 26) + ord('a'));

                // Convert back to uppercase if needed
                if ($isUppercase) {
                    $char = strtoupper($char);
                }
            }

            $encryptedText .= $char;
        }

        return $encryptedText;
    }

    /**
     * Decrypts a given ciphertext using the Caesar Cipher.
     *
     * @param string $ciphertext The text to be decrypted.
     * @return string The decrypted text.
     */
    public function decrypt($ciphertext)
    {
        // Validate input
        if (!is_string($ciphertext)) {
            throw new InvalidArgumentException("Input must be a string.");
        }

        // To decrypt, we use a negative shift value
        $this->shift = -$this->shift;

        // Use the encrypt method for decryption
        $decryptedText = $this->encrypt($ciphertext);

        // Restore the original shift value
        $this->shift = abs($this->shift);

        return $decryptedText;
    }
}

?>
