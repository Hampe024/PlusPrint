<!doctype html>
<html lang="sv">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Plusprint | <?= $title ?? null ?></title>
        <link rel="stylesheet" href="../src/css/style.css">
        <link rel="stylesheet" href="../src/css/navbar.css">
        <link rel="stylesheet" href="../src/css/home.css">
        <link rel="stylesheet" href="../src/css/products.css">
        <link rel="stylesheet" href="../src/css/FAQ.css">
        <link rel="stylesheet" href="../src/css/about.css">
        <link rel="icon" href="../src/img/Temporär.png">
    </head>
    <body>
        <header></header>
        <div class="bar"></div>

        <div class="wrapper">
            <nav>
                <ul class="navbar">
                    <?php require __DIR__ . "/navbar.php" ?>
                </ul>
            </nav>

            <main class="main">
                <?php if (isset($main)) : ?>
                    <?= $main ?>
                <?php else : ?>
                    <p>Error, could not load paige</p>
                    <p>DEBUG: $main is not set<p>
                <?php endif; ?>
            </main>

        </div>
        <footer class="footer">
            <div class="f-content">
                &reg; &copy; Plusprint 
                <div class="f-mail">
                    <?= json_decode(file_get_contents("../src/data.json"), true)["About"]["mail"] ?>
                </div>
            </div>
        </footer>
    </body>
</html>