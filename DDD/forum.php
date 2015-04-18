<?php
namespace DB_ND3\AR;

use CommentRepository;
use ForumRepository;

include_once('CommentRepository.php');
include_once('ForumRepository.php');
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

<?php
$forRep = new ForumRepository();
$threads = $forRep->getAll();
?>
<div class="title"> Forumas </div>
<table class="table">
    <tbody>
    <?php
        foreach($threads as $thread) {
        ?>

        <tr>
            <td> ID: <?php echo $thread['id'];?> </td>
            <td> Autorius: <?php echo $thread['author'];?> </td>
            <td> Pavadinimas: <?php echo $thread['title'];?> </td>
            <td> Data: <?php echo $thread['date'];?> </td>
            <td> Komentarų skaičius: <?php echo $thread['commentCount'];?> </td>
        </tr>

        <tr><td colspan="5">
                <table class="table" border-color="red">
                    <?php
                    echo "comment will be here";
//                    $comments = $tl->current()->getComments();
//                    while($comments->valid()){
//                        ?>
<!--                        <tr>-->
<!--                            <td> Komentaro ID: --><?php //echo $comments->current()->getId();?><!--</td>-->
<!--                            <td> Komentaro autorius:--><?php //echo $comments->current()->getAuthor();?><!--</td>-->
<!--                            <td> Komentaro data: --><?php //echo $comments->current()->getDate();?><!--</td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td> Komentaras: --><?php //echo $comments->current()->getComment();?><!--</td>-->
<!--                        </tr>-->
<!--                        --><?php
//                        $comments->next();
//                    }
                    ?>
                </table>
            </td></tr>
        <?php
    }
    ?>
    </tbody>
</table>