<!DOCTYPE html>
<html lang="en">

<head>
<?= $this->include('layouts/head') ?>
</head>

<body>

    
    <?= $this->include('layouts/header') ?>
    <?= $this->include('layouts/welcome') ?>
    
    <?= $this->renderSection('content') ?>
    
    <?= $this->include('layouts/footer') ?>

	<!-- Jquery dan Bootsrap JS -->
	<?= $this->include('layouts/scripts') ?>
</body>

</html>