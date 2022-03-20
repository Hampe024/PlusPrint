<div class="grid-container">
    <?php foreach ($data["products"] as $key => $idx) : ?>
        <a href="../Products?article=<?= $key ?>" class="grid-item">
            <?php if (count($idx["pictures"] ?? []) > 0) : ?>
                <img src="../src/img/<?= $idx['pictures']['0'] ?>">
            <?php else : # no pictures ?>
                <img src="../src/img/Temporär.png">
            <?php endif ?>
            <div class="article-title"> 
                <?= $key ?>
            </div>
        </a>
    <?php endforeach; ?>
</div>