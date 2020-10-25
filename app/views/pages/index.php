<?php require APPROOT . '/views/inc/header.php'; ?>

<h1><?php echo $data['title'] ?></h1>

<h3><?php echo APPROOT; ?></h3>
<ul>
    <?php foreach($data['posts'] as $post): ?>
        <li><?php echo $post->title ?></li>
    <?php endforeach ?>
</ul>
<?php require APPROOT . '/views/inc/footer.php'; ?>
