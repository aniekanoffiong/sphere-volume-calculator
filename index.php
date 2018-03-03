<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Volume of Sphere</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h3 class="heading">CALCULATING THE VOLUME OF A SPHERE</h3>
        <div class="row">
            <div class="col-6 border-right">
                <img src="img/sphere-image.png" alt="Image of a Sphere" class="img">
            </div>
            <div class="col-6">
                <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                    <?php 
                        if (isset($_GET['error'])) : ?>
                            <h4 class="error">The Radius should only be numbers</h4>
                    <?php endif; ?>
                    <label for="radius">Enter the Radius of the Sphere</label>
                    <div class="input-group">
                        <input type="number" name="radius" value="<?php if(isset($_POST['radius'])): echo $_POST['radius']; endif; ?>" id="radius" class="input">
                        <span class="input-addon">cm</span>
                    </div>
                    <input type="submit" value="Calculate" name="calculate" class="button">
                    <p>Taking the value of π = 3.142</p>
                </form>
            </div>
        </div>
        <div class="clear"></div>
        <hr class="rule"/>
    </div>        
    <div class="container">
        <?php 
            if (isset($_POST['calculate'])) :
                // Using the formular for calculating the volume of a sphere as 
                // V = 4/3 π r ^ 3 
                // π == 3.142
                // Get the radius and perform filter_var
                $radius = filter_var($_POST['radius'], FILTER_SANITIZE_STRING);
                $pi = 3.142;
                // Check if the value of the radius is a number and return error if it is not
                if (! is_numeric($radius)) :
                    header('location: index.php?error');
                endif;
                $volume = (4 / 3) * 3.142 * $radius;
            ?>
                <div class="row text-center">
                    <h3 class="info">Showing Calculation</h3>
                    <div class="calculation">
                        <p>
                            Formular for Volume of a Sphere = <sup>4</sup>/<sub>3</sub> π r<sup>3</sup>
                        </p>
                        <p>where π = 3.142; r = <?= $radius ?></p>
                        <p>Volume = <sup>4</sup>/<sub>3</sub> x <?= $pi .' x ' . $radius ?><sup>3</sup></p>
                        <p>Volume = <?= $volume; ?></p>
                        <h2 class="inline">≈ <strong><?= round($volume, 2); ?> cm<sup>3</sup></strong></h2> to 2 d.p.
                    </div>
                </div>
            <?php endif; ?>
    </div>
    <style src="js/script.js"></style>
</body>
</html>