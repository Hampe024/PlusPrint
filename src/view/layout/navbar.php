<?php

$items = [
    "<img class='logo' src='../src/img/pluslogo.png'>" => "../Home",
    "Produkter" => "../products",
    "Bra att veta" => "../faq",
    "Om oss" => "../about"
];

$curPage = basename($_SERVER["REQUEST_URI"]);

?>
<li>
    <?php foreach ($items as $key => $val) :
        $selected = ($curPage === $val) ? "selected" : null;
        ?>
        <a class="navItems <?= $selected ?>" href="<?= $val ?>"><?= $key ?></a>
    <?php endforeach; ?>
</li>