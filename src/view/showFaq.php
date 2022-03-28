<div class="intro"> 
    <?= $data["FAQ"]["intro"] ?> 
</div>

<div class="questions">
    <?php foreach ($data["FAQ"]["Questions"] as $key => $idx) : ?>
        <label for="<?= $key ?>">
            <p><?= $key ?></p>
            <img src="../src/img/collapse-arrow.png">
        </label>
        <input type="checkbox" id="<?= $key ?>" />

        <div class="content">
            <?= $idx ?>
        </div>
    <?php endforeach; ?>
</div>