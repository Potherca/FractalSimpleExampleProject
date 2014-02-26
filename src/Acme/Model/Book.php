<?php

namespace Acme\Model;

/**
 * Book
 *
 * @var Author author
 */
class Book extends ModelAbstract
{
    public $id;
    public $title;
    public $yr;
    public $author_email;
    public $author_name;

    /**
     * Lazy Loader for Embedded Properties
     *
     * Currently only "author" is supported
     *
     * @param string $name Name of the property to get
     *
     * @throws \UnexpectedValueException
     * @return ModelAbstract
     */
    public function __get($name)
    {
        $attribute = null;

        switch ($name) {

            case 'author':
                $attribute = new Author();
                $attribute->name = $this->author_name;
                $attribute->email = $this->author_email;
                break;

            default:
                throw new \UnexpectedValueException('Property "' . $name . '" not found');
                break;
        }

        return $attribute;
    }
}

/*EOF*/