<?php

function renommage($fichierSource, $titleFile){
    $resultat = $titleFile;
    $resultat = str_replace(" ","-",$resultat);
    $ext = substr($fichierSource, strrpos($fichierSource,"."));
    return $resultat.$ext;
}

?>