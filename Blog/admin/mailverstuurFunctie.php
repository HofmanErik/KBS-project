<?php

//Deze variabelen worden opgeroepen in de mailfunctie.

function mailVersturen($to) {
    $to = $to;    
    $from = "vindbaarin2212@gmail.com";
    $subject = "Er is een reactie toegevoegd aan $titel";
    $message = "Beste beheerder/moderator, er is een nieuwe reactie toegevoegd aan uw blog $titel";
    $headers = "From: $from";

// De functie die de mail daadwerkelijk verstuurd.
    mail($to, $subject, $message, $headers);

// De gebruiker krijgt een een melding te zien met dat de mail is verstuurd.
    echo "Bedankt voor reageren, uw reactie is in afwachting op goedkeuring";
}

?>