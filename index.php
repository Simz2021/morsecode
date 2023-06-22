<!DOCTYPE html>
<html>
<head>
    <title>Morse Code to Letter Converter</title>
    <script>
        function validateInput(event) {
            var keyCode = event.which || event.keyCode;
            var key = String.fromCharCode(keyCode);

            // Allow backspace, space, and dash
            if (keyCode === 8 || keyCode === 32 || keyCode === 45) {
                return true;
            }

            // Allow dots and dashes
            var validCharacters = /^[.\-]+$/;
            if (validCharacters.test(key)) {
                return true;
            }

            event.preventDefault();
            return false;
        }
    </script>
</head>
<body>
    <h1>Morse Code to Letter Converter</h1>
    <form method="post" action="">
        <label for="morseCodeInput">Enter Morse Code:</label>
        <input type="text" name="morseCodeInput" id="morseCodeInput" onkeypress="return validateInput(event)">
        <input type="submit" name="convert" value="Convert">
    </form>
    
    <?php
    function morse_to_letter($morse_code)
    {
        $morse_codes = array(
            '.-' => 'A', '-...' => 'B', '-.-.' => 'C', '-..' => 'D', '.' => 'E',
            '..-.' => 'F', '--.' => 'G', '....' => 'H', '..' => 'I', '.---' => 'J',
            '-.-' => 'K', '.-..' => 'L', '--' => 'M', '-.' => 'N', '---' => 'O',
            '.--.' => 'P', '--.-' => 'Q', '.-.' => 'R', '...' => 'S', '-' => 'T',
            '..-' => 'U', '...-' => 'V', '.--' => 'W', '-..-' => 'X', '-.--' => 'Y',
            '--..' => 'Z'
        );

        return $morse_codes[$morse_code] ?? null;
    }

    if (isset($_POST['convert'])) {
        $morseCodeInput = $_POST['morseCodeInput'];
        $result = morse_to_letter($morseCodeInput);

        if ($result) {
            echo '<p>Letter: ' . $result . '</p>';
        } else {
            echo '<p>Invalid Morse code.</p>';
        }
    }
    ?>
</body>
</html>
