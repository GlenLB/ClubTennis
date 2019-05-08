<?php
// Définition du type MIME du fichier pour retour AJAX
header("Content-type: text/plain");
session_unset();
session_destroy();
session_write_close();
setcookie(session_name(), '', 0, '/');
session_regenerate_id(true);
echo ("ok");
