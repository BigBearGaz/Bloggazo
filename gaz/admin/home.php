<?php 
require_once('functions.php');
include('modal.php');
?>

<h1>Page d'accueil</h1>
<div class="row">
<button type="button" class="btn btn-success mt-3 col-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
Cree un nouveau post</button><?php
$posts = get_posts();
foreach($posts as $post){
    ?>
<div class="col-12">
            <div class="card container">
                <div class="card-content">
                    <h5 class="grey-text text-darken-2"><?= $post->title ?></h5>
                    <h6 class="grey-text">Le <?= date("d/m/Y à H:i",strtotime($post->date)); ?> par <?= $post->name ?></h6>
                </div>
                <div class="card-image waves-effect waves-block waves-light">
                <img src="<?= $post->image ?>" alt="<?= $post->title ?>">
            </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4"><i class="material-icons right">more_vert</i></span>
                    <p><a href="index.php?page=post&id=<?= $post->id ?>">Voir l'article complet</a></p>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4"><?= $post->title ?> <i class="material-icons right">close</i></span>
                    <p><?= substr(nl2br($post->content),0,1000); ?>...</p>
                </div>
                <button type="button" class="btn btn-info mt-3 col-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Modifier</button>
                <button type="button" class="btn btn-danger mt-3 col-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Deleate</button>
            </div>
        </div>

    <?php
}

?>
</div>

