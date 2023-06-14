<!DOCTYPE html>

<?php 
    require_once 'app.php';
    include_once __DIR__ .'/Templates/header.php';
?>

<header>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="images/logo.jpg" alt="Logo app SGAV" id="logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<nav></nav>

<main>
    <?php 
        include_once __DIR__ .'/view/Country/regCountry.php';
    ?>

    <div class="mt-3">
        <?php 
            include_once __DIR__ .'/view/Country/selectCountry.php';
        ?>
    </div>
    
    <div class="mt-3">
        <?php 
            include_once __DIR__ .'/view/Country/listPaises.php';
        ?>
    </div>
    
    <div class="mt-3">
        <?php 
            include_once __DIR__ .'/view/Country/listCountry.php';
        ?>
    </div>
</main>

<footer></footer>

<?php 
    include_once __DIR__ .'/Templates/footer.php';
?>  
