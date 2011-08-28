# PHP_CURL

PHP_CURL is an object-oriented implementation of the PHP's functional CURL interface.

## Basic Usage

Since PHP_CURL allows for method-chaining, the static `init` method is used to
generate an instance of a CURL object (similar to `curl_init`).

    <?php
	
	$curl = CURL::init("http://reddit.com/r/php/.json");

    ?>

We can then set some CURL options:

    <?php

    $curl = CURL::init("http://www.reddit.com/r/php/.json")
                ->setReturnTransfer(TRUE);

    ?>

All `set...` functions return an instance of the current CURL object, so you
are free to set as many of the options in a row as necessary before executing.

    <?php

    $curl = CURL::init("http://www.reddit.com/r/php/.json")
            ->setReturnTransfer(TRUE);

    $response = $curl->execute():

    ?>

All of the functions are close matches to the CURLOPT_* alternatives.

## Comparison to functional cURL

The basic example given in the PHP manual for functional cURL is as follows:

    <?php

    $ch = curl_init("http://www.example.com/");
    $fp = fopen("example_homepage.txt", "w");

    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);

    curl_exec($ch);
    curl_close($ch);
    fclose($fp);
    ?>

We can perform the same operation with PHP_CURL like so:

    <?php

    $fp = fopen("example_homepage.txt", "w");

    CURL::init("http://www.example.com/")
        ->setFile($fp)
        ->setHeader(0)
        ->execute()
        ->close();

    fclose($fp);

    ?>

There isn't much of a difference in terms of code-size or performance, however,
the PHP_CURL approach is arguably more readible, and less repeatitive.

One major benefit to using this approach is that it enables us to take advantage
of PHP editors with auto-completion, so setting multiple cURL options should be
somewhat easier.

## Issues

At present, there is no support for `curl_multi...`. Support for `curl_multi...`
is coming soon.

## Why do this?

I found that writing for CURL in PHP was repeatitive and cumbersome, and 
having a quick, object-oriented and more readable way of performing quick CURL
tasks was something I've wanted for a while.

I don't claim to have done anything special here, nor do I propose that this
should be used in any sort of production environment. It's quick and dirty, but
it's working for me.

I strongly encoruage any sort of feedback, patches or contributions. I'd be more
than happy to open up this project to more developers if there is any demand.