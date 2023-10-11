<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Mes amis</h1>
    </header>
    <main>
        <ul>
            <?php foreach ($friends as $friend): ?>
                <li><?=$friend['firstname'] . " " . $friend['lastname']?></li>  
            <?php endforeach; ?> 
        </ul>
        <?php 
       
            
       $data = array_map('trim', $_POST);
       $data = array_map('htmlentities', $data);

        $errors = [];
        if (!empty($_POST)){
            if (!isset($data['firstname']) || empty($data['firstname'])){
                $errors[] = "Le prénom doit etre remplis"; 
            }
            if (strlen($data['firstname']) > 45){
                $errors[] = "Le prénom est trop long !"; 
            }
            if (!isset($data['lastname']) || empty($data['lastname'])){
                $errors[] = "Le nom doit etre remplis"; 
            }
            if (strlen($data['lastname'] > 45)){
                $errors[] = "Le nom est trop long !"; 
            }
                getNewFriend();
        }
        ?>
        <form action="" method="post" class='container'>

                <input type="text" id="firstname" name="firstname" placeholder="First name" required>
                
                <input type="text" id="lastname" name="lastname" placeholder="Last name" required>

                <button class="contrast"
                data-target="modal-example"
                onClick="toggleModal(event)">
                Submit
                </button>
                <dialog id="modal-example">
                    <article>
                        <a href="#close"
                        aria-label="Close"
                        class="close"
                        data-target="modal-example"
                        onClick="toggleModal(event)">
                        </a>
                        <h3>Confirm your action!</h3>
                        <p>
                        Vous êtes sûr que c'est vraiment un bon ami ? Attention vérifiez bien que c'en est un avant de l'ajouter à votre super liste d'amis!
                        </p>
                        <footer>
                        <a href="#cancel"
                            role="button"
                            class="secondary"
                            data-target="modal-example"
                            onClick="toggleModal(event)">
                            J'ai réffléchi c'en est pas un !
                        </a>
                        <a href="#confirm"
                            role="button"
                            data-target="modal-example"
                            onClick="toggleModal(event)">
                            C'est bon il est cool !
                        </a>
                        </footer>
                    </article>
                </dialog>

        </form>
        
    </main>
</body>
</html>