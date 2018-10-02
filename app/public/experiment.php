<?php
    /* Top Level Variables */
    $name = 'Dirk Dunn';
?>

<h1>This page is all about
<?php
    for($i=0, $length=5; $i<$length; $i++){
        echo "$name<br>";
    }
?>
</h1>
<h2>All about <?php echo $name; ?></h2>