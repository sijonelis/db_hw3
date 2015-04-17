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
            <td> <?php echo $tl->current()->getId();?> </td>
            <td> <?php echo $tl->current()->getAuthor();?> </td>
            <td> <?php echo $tl->current()->getTitle();?> </td>
            <td> <?php echo $tl->current()->getPostDate();?> </td>
            <td> <?php echo $tl->current()->getPostCount();?> </td>
        </tr>
    <?php
        $tl->next();
    }
    ?>
</tbody>
</table>