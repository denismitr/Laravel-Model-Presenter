<?php

namespace Denismitr\Presenter;

use Denismitr\Presenter\Exceptions\PresenterException;

abstract class Presenter
{
    protected $entity;
    protected $lang;

    /*
    * @param $entity, $lang
    */
    public function __construct($entity, $lang)
    {
        $this->entity = $entity;

        if (empty($lang) || $lang === 'ru') {
            $this->lang = '';
        } else {
            $this->lang = '_' . $lang;
        }
    }

    /*
    * Allows to retrieve methods results in property-style
    *
    * @param $property
    * @return mixed
    * @throw PresenterException
    */
    public function __get($property)
    {
        if (method_exists($this, $property)) {
            return call_user_func([$this, $property]);
        }

        $errorMessage = "Could not find property %s on the class %s";

        throw new PresenterException(sprintf($errorMessage, $property, static::class));
    }
}
