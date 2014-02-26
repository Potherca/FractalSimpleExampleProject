<?php

namespace Acme\Model;

abstract class ModelAbstract
{
    public static function all()
    {
        return static::getAll();
    }

    public static function find($id)
    {
        $models = static::getAll();

        if (isset($models[$id]) === false) {
            throw new \UnexpectedValueException(
                'Could not find item for given ID "' . $id . '"'
            );
        } else {
            return $models[$id];
        }
    }

    protected static function getAll()
    {
        $models = array(
            1 => array(
                'id' => '1',
                'title' => 'Hogfather',
                'yr' => '1998',
                'author_name' => 'Terry Pratchett',
                'author_email' => 'philip@example.com',
            ),
            2 => array(
                'id' => '2',
                'title' => 'Going Postal',
                'yr' => '2004',
                'author_name' => 'Terry Pratchett',
                'author_email' => 'philip@example.com',
            )
        );

        foreach($models as $id => $modelContent){
            $model = new static;
            foreach ($modelContent as $key => $value) {
                $model->{$key} = $value;
            }
            $models[$id] = $model;
        }

        return $models;
    }
}