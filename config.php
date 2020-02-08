<?php 

    require 'paypal/autoload.php';

    $apiContext = new \PayPal\Rest\ApiContext(
        new \PayPal\Auth\OAuthTokenCredential(
            // ClienteID
            'AbC63TdVx3H0oaWTMs2ONn6dSE_gYYDcezkQsBTmOEqWd5b6jlcyrbVebEXpT8H84YoMYLVA85iUNHHd',
            // Secret
            'EMlMuagBHaNuQrb3tJMMMfWyardRhXb1z1ON80ok1sxRYnzCM-YddBFN09NLgU3ms0esoSt1PfVE7Qk2'
        )
    );