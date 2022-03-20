<?php

require_once('../src/functions.php');

$article = $_GET["article"] ?? Null;

$data["title"] = $article ?? "Produkter";

if (isset($article)) # if user has selected article to view
    {
        $data["main"] = renderToString("../src/view/showProductArticle.php", [json_decode(file_get_contents("../src/data.json"), true)["products"][$article], $article]);
    }

else                # shows list of articles
    {
        $data["main"] = renderToString("../src/view/showProducts.php", json_decode(file_get_contents("../src/data.json"), true));
    }

render("../src/view/layout/base.php", $data);
