# Giveaway Code Generator

**Note:** This repository is archived and no longer maintained. A better implementation is available at: [https://github.com/srueegger/codegenerator.rueegger.dev](https://github.com/srueegger/codegenerator.ruegger.dev).

---

This repository contains basic PHP code for generating giveaway codes. It consists of two files:

- `index.php`
- `functions.php`

## Overview

The code generator creates unique giveaway codes and saves them in both a text file and a CSV file. The generated codes can be customized, including the length of the codes and the characters used.

## Files

### `index.php`

This file contains the main script for code generation and the HTML form for inputting parameters.

#### Functions:

- Starts the code generation process upon form submission.
- Opens or creates the output files (`codes.txt` and `codes.csv`).
- Checks if generated codes already exist and avoids duplicates.
- Generates the codes using the function from `functions.php`.
- Displays links to download the generated codes.

### `functions.php`

This file contains the function for generating random strings.

#### Functions:

- `generateRandomString($length, $characters)`: Generates a random string of the specified length from the given character set.

## Usage

1. Upload the `index.php` and `functions.php` files to your web directory.
2. Open `index.php` in your web browser.
3. Enter the desired parameters in the form:
   - Number of characters per code.
   - Character set (e.g., A-Z, 0-9, a-z).
   - Number of codes to generate.
4. Click "Generate Code".
5. After the process is complete, you can download the generated codes as a text or CSV file.

## Example

The following example shows the usage of the `generateRandomString` function in `functions.php`:

```php
<?php
function generateRandomString($length = 10, $characters) {
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>
```
---

For any questions or issues, please contact samuel.ruegger@compresso.ch.