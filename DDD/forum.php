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
$comRep = new CommentRepository();
$threads = $forRep->getAll();
?>
<div class="title"> Forumas </div>
<table class="table">
    <tbody>
    <?php
    if($threads)
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
                    $comments = $comRep->getCommentsByThreadId($thread['id']);
                    if($comments)
                     foreach($comments as $comment){
//                        ?>
                        <tr>
                            <td> Komentaro ID: <?php echo $comment['id'];?></td>
                            <td> Komentaro autorius:<?php echo $comment['author'];?></td>
                            <td> Komentaro data: <?php echo $comment['date'];?></td>
                        </tr>
                        <tr>
                            <td> Komentaras: <?php echo $comment['comment'];?></td>
                        </tr>
                        <?php
                    }
                    unset ($comments);
                    unset ($comment);
                    ?>
                </table>
            </td></tr>
        <?php
    }
    unset($thread);
    unset($threads);
    ?>
    </tbody>
</table>