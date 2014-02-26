<?php
namespace Acme\Transformer;

use Acme\Model\Book;
use League\Fractal;

class BookTransformer extends Fractal\TransformerAbstract
{
    protected $availableEmbeds = array(
        'author'
    );

    public function transform(Book $book)
    {
        return array(
            'id' => (int) $book->id,
            'title' => $book->title,
            'year' => $book->yr,
            //@NOTE: If $book->author is used instead of $book->author_name, `author` will always be "embedded", regardless of the value of `$_GET['embed']`
            'author' => $book->author_name,
        );
    }

    public function embedAuthor(Book $book)
    {
        $author = $book->author;

        return $this->item($author, new AuthorTransformer());
    }
}
