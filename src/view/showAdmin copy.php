<?php
$json = $data[0];
$action = $data[1];
$url = (explode("|", $_GET["url"] ?? "") === [""]) ? null : explode("|", $_GET["url"] ?? "");
$json_URL = $_GET["json_URL"] ?? null; # what place in json to effect
?>
<script>
    Function URL_to_sess(<?= $URL ?>)
        {
            console.log("HEHEHEHHE")
            <?= $_SESSION["URL"] = $URL ?>
        }
</script>

<?php echo $_SESSION["URL"] ?? "hej" ?>


<?php if ($json_URL === null) : # user selects place in json to effect ?>

    <h3>Välj var du vill ändra</h3>

        <form method="get">
            <select name='url' class="dropdown_adm">
                <option disabled selected><?= $url[0] ?? "Välj underrubrik" ?></option>
                <?php foreach ($json as $key => $i) : ?>
                    <option value='<?= $key ?>'><?= $key ?></option>
                <?php endforeach ?>
            </select>
            <input type="submit" value="Nästa">
        </form>

        <?php if (isset($url[0]) && gettype($json[$url[0]]) === "array") : ?>
            <form method="get">
                <select name='url' class="dropdown_adm">
                    <option disabled selected><?= $url[1] ?? "Välj underrubrik" ?></option>
                    <?php foreach ($json[$url[0]] as $key => $i) : ?>
                        <option value='<?= $url[0] ?>|<?= $key ?>'><?= $key ?></option>
                    <?php endforeach ?>
                </select>
                <input type="submit" value="Nästa">
            </form>
        <?php endif; ?>

        <?php if (isset($url[1]) && gettype($json[$url[0]][$url[1]]) === "array") : ?>
            <form method="get">
                <select name='url' class="dropdown_adm">
                    <option disabled selected><?= $url[2] ?? "Välj underrubrik" ?></option>
                    <?php foreach ($json[$url[0]][$url[1]] as $key => $i) : ?>
                        <option value='<?= $url[0] ?>|<?= $url[1] ?>|<?= $key ?>'><?= $key ?></option>
                    <?php endforeach ?>
                </select>
                <input type="submit" value="Nästa">
            </form>
        <?php endif; ?>
        
        <br><br>

        <form method="get">
            <button type="submit" name="json_URL" value="on" onclick="URL_to_sess(<?=$json?>)">Redigera vald</button>
        </form>

<?php else : # user has choosen place in json to effect ?>

    <!-- <?php if ($action === "") : # user selects to edit/remove or add ?>
        <h3>Vill du:</h3>
        <form method="get">
            <input type="submit" name="action" value="redigera ett element">
            <input type="submit" name="action" value="lägga till ett element">
    <?php endif; ?> -->

    <?= var_dump($json_URL) ?>

<?php endif; ?>
