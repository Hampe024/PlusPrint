<?php

require_once('../src/functions.php');

$data["title"] = "Kontakt";
$data["main"] = renderToString("../src/view/showAbout.php", json_decode(file_get_contents("../src/data.json"), true));

render("../src/view/layout/base.php", $data);
