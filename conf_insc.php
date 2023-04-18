<?php
session_start(); // L'image utilise les sessions. On les active donc ici, car on a besoin de ces informations.
$debut_html = '
    <html>
        <head>
            <title>Inscription</title>
        </head>
        <body>
            <p>';
    $milieu_html = NULL;
    $fin_html = '
            </p>
        </body>
    </html>';
    if(isset($_POST['verif_code']) AND !empty($_POST['verif_code'])) {
    // Le champ du code de confirmation a été rempli
        if($_POST['verif_code']==$_SESSION['aleat_nbr']) { // Si le champ est égal au code généré par l'image
            $milieu_html = 'Vous avez entré le bon code de confirmation !';
        } else {
            $milieu_html = 'Votre code de confirmation n\'est pas bon! Merci de réessayer.<br/>
            <a href="#" onclick="history.go(-1);">Retour</a>';
        }
    } else {
        $milieu_html = 'Vous devez remplir le champ du code de confirmation !';
    }
    // Là, on affiche toute la source générée :
    echo $debut_html . $milieu_html . $fin_html;
