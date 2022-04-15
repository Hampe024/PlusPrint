<?php

require_once('../src/functions.php');

$data["title"] = "Admin";

$data["main"] = <<< EOD
<div id="dropDowns">
    <select class="dropdown_adm" id="dropDown0" onChange='newDropDown(this)'>
    </select>
</div>

<div id="editDiv">
    <input type="button" id="editButton" value="Redigera vald" onclick="editCurrent()">
</div>

<div id="textarea">
</div>

<div id="submitDiv">
    <input type="submit" value="Spara ändring" onclick="saveEdit()">
</div>
EOD; # uses code in script.js to load dropdowns

render("../src/view/layout/base.php", $data);
