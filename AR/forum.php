<?php
namespace DB_ND3\AR;

include('ThreadList.php');
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

<?php
$tl = new ThreadList();
$tl->loadAll();
?>
<div class="title"> Forumas </div>
<table class="table">
    <tbody>
    <?php
    while($tl->valid()) {
        ?>

        <tr>
            <td> ID: <?php echo $tl->current()->getId();?> </td>
            <td> Autorius: <?php echo $tl->current()->getAuthor();?> </td>
            <td> Pavadinimas: <?php echo $tl->current()->getTitle();?> </td>
            <td> Data: <?php echo $tl->current()->getPostDate();?> </td>
            <td> Komentarų skaičius: <?php echo $tl->current()->getPostCount();?> </td>
        </tr>
 
        <tr><td colspan="5">
                <table class="table" border-color="red">
                    <?php
                    $comments = $tl->current()->getComments();
                    while($comments->valid()){
                        ?>
                        <tr>
                            <td> Komentaro ID: <?php echo $comments->current()->getId();?></td>
                            <td> Komentaro autorius:<?php echo $comments->current()->getAuthor();?></td>
                            <td> Komentaro data: <?php echo $comments->current()->getDate();?></td>
                        </tr>
                        <tr>
                            <td> Komentaras: <?php echo $comments->current()->getComment();?></td>
                        </tr>
                        <?php
                        $comments->next();
                    }
                    ?>
                </table>
            </td></tr>
        <?php
        $tl->next();
    }
    ?>
    </tbody>
</table>