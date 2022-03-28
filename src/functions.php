<?php

function render(string $tpl, array $data = []): void
{
    extract($data);
    require $tpl;
}

function renderToString(string $tpl, array $data = []): string
{
    ob_start();

    extract($data);
    require $tpl;
    $html = ob_get_contents();

    ob_end_clean();

    return $html ? $html : "";
}