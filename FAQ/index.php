<?php

require_once('../src/functions.php');

$data["title"] = "Bra att veta";
$data["main"] = renderToString("../src/view/showFaq.php", json_decode(file_get_contents("../src/data.json"), true));


render("../src/view/layout/base.php", $data);
