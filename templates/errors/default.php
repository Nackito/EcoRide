<?php require_once _ROOTPATH_ . '/templates/header.php'; ?>

<div>
    <?php if ($error) { ?>
        <div class="alert alert-danger">
            <?= $error; ?>
        </div>
    <?php  } ?>
</div>


<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?>