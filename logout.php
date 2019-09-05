<?php
    session_start();
    // Destruction d'une session si elle existe
    if (isset($_SESSION)) {
        session_destroy();
        }
    header('Location: /?accueil');
