<?php

use Acme\Model\Book;
use Acme\Transformer\BookTransformer;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;

require '../vendor/autoload.php';

// Create a top level instance somewhere
$fractal = new Manager();

if (isset($_GET['embed'])) {
    $fractal->setRequestedScopes(explode(',', $_GET['embed']));
}

// Get data from some sort of source
$books = Book::all();

// Pass this array (collection) into a resource, which will also have a "Transformer"
// This "Transformer" can be a callback or a new instance of a Transformer object
// We type hint for array, because each item in the $books var is an array
$resource = new Collection($books, new BookTransformer());

// Turn all of that into JSON
$json = $fractal->createData($resource)->toJson();

header('Content-Type: application/json');
echo $json;

//EOF
