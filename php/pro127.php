<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $str1 = "Welcome to world of PHP strings with visual studio code";

        //$pattern = "/o/";
        //$pattern = "/p/";
        $pattern = "/o/i";

        var_dump(preg_replace($pattern, "O", $str1));
    ?>
</body>
</html>