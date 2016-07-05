<?php

namespace Denismitr\Presenter\Contracts;

interface PresentableInterface
{
    /*
    * Get a presenter interface
    *
    * @param $lang
    * @return mixed
    */
    public function present($lang = null);
}
