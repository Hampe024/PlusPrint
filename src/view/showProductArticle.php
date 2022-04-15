<?php
$json = $data[0];
$article = $data[1];
?>

<script>
    function changeGallery(id)
    {
        <?php foreach ($json["pictures"] as $key => $idx) : ?>
            document.getElementById("gallery-img<?= $key ?>").style.display = "none";
        <?php endforeach; ?>
        document.getElementById(id).style.display = "block";
    }
</script>


<a href="../Products" class="back-arrow">
    <img src="../src/img/arrow.png" class="arrow-img">
    Tillbaka
</a>



<div class="article-main">
    <div class="gallery">
        <div class="gallery-big">
            <?php if (count($json["pictures"] ?? []) > 1) : ?>
                <?php foreach ($json["pictures"] as $key => $idx) : ?>
                    <img src="../src/img/<?= $idx ?>" id="gallery-img<?= $key ?>" onload="resizeToMax(this.id)">
                <?php endforeach; ?>
        </div>
    <?php if (count($json["pictures"] ?? []) > 3) : ?>
        <div class="gallery-small">
    <?php else : # less pictures than 3 ?>
        <div class="gallery-small gallery-small-few">
    <?php endif; ?>
                <?php foreach ($json["pictures"] as $key => $idx) : ?>
                    <input type="image" src="../src/img/<?= $idx ?>" class="gallery-small-img" onclick="changeGallery('gallery-img<?= $key ?>')">
                <?php endforeach; ?>
            <?php elseif (count($json["pictures"] ?? []) == 1) : ?>
                <img src="../src/img/<?= $json["pictures"]["0"] ?>" class="gallery-img" id="gallery-img0">
            <?php else : # no pictues ?>
                <img src="../src/img/Temporär.png" class="gallery-img" id="gallery-img0">
            <?php endif; ?>
        </div>
    </div>
    <div class="article-order">
        <p class="article-text">
            <?= $article ?>
        </p>
        <a href="mailto:tryckeri@plusprint.se?Subject=Beställning av <?= $article ?>" title="Maila mig på trycker@plusprint.se">Beställ här!</a>
    </div>
</div>

<div class="article-sub">
    <?php if ($json["links"] ?? false) : # links exist ?>
        <div class="texts">
    <?php else : # no links ?>
        <div class="texts-no-link">
    <?php endif; ?>
            <?php if (count($json["texts"] ?? []) > 1) : ?>
                <?php foreach ($json["texts"] as $key => $idx) : ?>
                    <label for="<?= $key ?>">
                        <p><?= $key ?></p>
                        <img src="../src/img/collapse-arrow.png">
                    </label>
                    <input type="checkbox" id="<?= $key ?>" />

                    <div class="content">
                        <p> <?= $idx ?> </p>
                    </div>
                <?php endforeach; ?>
            <?php elseif (count($json["texts"] ?? []) == 1) : ?>
                <?php foreach ($json["texts"] as $key => $idx) : ?>
                    <div class="text-single">
                        <h2> <?= $key ?> </h2>
                        <br>
                        <?= $idx ?>
                    </div>
                <?php endforeach; ?>
            <?php else : # no texts ?>
            <?php endif; ?>
        </div>

    <?php if ($json["links"] ?? false) : # links exist?>
        <div class="links">
            <h2>Kataloger:</h2>
            <?php foreach ($json["links"] as $key => $idx) : ?>
                <br>
                <a href="<?= $idx ?>" target="_blank"><?= $key ?></a>
                <br>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

