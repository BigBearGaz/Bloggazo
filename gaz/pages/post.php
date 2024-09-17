<?php

$post = get_post();
if($post == false){
    header("Location:index.php?page=error");
}else{
    ?>
    <div class="container row mb-5 d-flex justify-content-center">
    <img src="<?= $post->image ?>" class="col-8 mb-3" alt="<?= $post->title ?>">
    <h2 class="text-center mb-3"><?= $post->title ?></h2>
    <h6 class="text-center mb-3">Par <?= $post->name ?> le <?= date("d/m/Y à H:i", strtotime($post->date)) ?>;</h6>
    <p class="text-center mt-3"><?= $post->content ?></p>
        <?php
}
?>

<hr>

<h4 class="mb-5">Commentaires</h4>

<?php 
    $responses= get_comments();
    foreach($responses as $response){
        ?>
        <blockquote>
            <strong><?= $response->name ?> (<?=date("d/m/Y", strtotime($response->date))?>)</strong>
            <p><?= nl2br($response->comment);?></p>
        </blockquote>
        <?php
    }
?>





<h4>Commenter:</h4>

<?php 
    if(isset($_POST['submit'])){
        $name = htmlspecialchars(trim($_POST['name']));
        $email = htmlspecialchars(trim($_POST['email']));
        $comment = htmlspecialchars(trim($_POST['comment']));
        $errors = [];
    
    if(empty($name) || empty($email)  || empty($comment)){
        $errors['empty']="Tout les champs n'ont pas été remplis";
    }else{
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $errors['email']= "L'adresse mail n'est pas valide";
        }
    }


    if(!empty($errors)){
        ?>
        <div class="card red">
            <div class="card-content white-text">
                <?php foreach($errors as $error){
                    echo $error;
                    }
                ?>
            </div>
        </div>
        <?php
    }else{
        comment($name,$email,$comment);
        ?>
        <?php
    }
}
?>




<form method="post">
    <div class="input-field col s12 m6">
        <input type="text" name="name" id="name"/>
        <label for="name">Nom de l'auteur</label>
    </div>
    <div class="input-field col s12 m6">
    <input type="email" name="email" id="email"/>
    <label for="email">Adresse email</label>
    </div>
    <div class="input-field col s12">
        <textarea name="comment" id="comment" class="materialize-textarea"></textarea>
        <label for="comment">Commentaires</label>
    <button type="submit" name="submit" class="btn orange waves-effect mt-3">
    Commenter ce post   
        </div>
    </div>
</form> 