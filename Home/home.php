<?php

require_once('../src/functions.php');

$data["title"] = "Home";
$data["main"] = renderToString("../src/view/showHome.php", json_decode(file_get_contents("../src/data.json"), true));


render("../src/view/layout/base.php", $data);
