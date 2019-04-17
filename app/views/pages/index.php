<?php require APPROOT . '/views/includes/header.php'; ?>


<div class="wrap">
    <div class="welcome">
        <div class="img-wrapper">
            <img src="<?php echo URLROOT ?>/img/flame_logo.png" alt="Flame logo">
        </div>
    <h1>
        <?php echo $data['title']; ?>
    </h1>
    <div class="links">
        <ul>
            <?php foreach ($data['links'] as $link) : ?>
                <li><a href="<?php echo $link['url'] ?>"><?php echo $link['name'] ?></a>
                <?php endforeach ?>
        </ul>
    </div>
    </div>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>