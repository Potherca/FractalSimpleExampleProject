<?php
namespace Acme\Transformer;

use Acme\Model\Author;
use League\Fractal;

class AuthorTransformer extends Fractal\TransformerAbstract
{
    public function transform(Author $author)
    {
        return array(
            'name' => $author->name,
            'mail' => $author->email,
        );
    }
}
