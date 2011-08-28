<?php

    include("../CURL.php");
    
    // Example 1. Grab some JSON
    $curl = CURL::init("http://www.reddit.com/r/php/.json")
            ->setReturnTransfer(TRUE);
    
    var_dump(json_decode($curl->execute()));
    
    // Example 2. Use our existing CURL object, and retrieve some headers
    $headers = 
        $curl->setHeader(TRUE)
            ->setNobody(TRUE)
            ->setReturnTransfer(TRUE)
            ->execute();
    
    print $headers . "\n";
    
    
    // Example 3. Using the `->get...` functions
    print $curl->getHTTPCode() . "\n";