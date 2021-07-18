<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <?php if ($winner):?>
            <div><strong>Reserve price:</strong> <p style="color: blue"><?=$reservePrice.$currencySign?></p></div>
            <div><strong>Winner:</strong> <p style="color: green"><?=$winner?></p></div>
            <div><strong>Winning price:</strong> <p style="color: red"><?=$winningPrice.$currencySign?></p></div>
        <?php else:?>
            <div>Bid should be highest or equal to the reserve price.</div>
        <?php endif;?>
    </div>
</body>
</html>
