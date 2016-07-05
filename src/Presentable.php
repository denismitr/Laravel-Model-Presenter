<?php

namespace Denismitr\Presenter;

use Denismitr\Presenter\Exceptions\PresenterException;

trait Presentable
{
    /*
     * Presenter instance
     */
    protected $presenterInstance;

    /*
     * Set the presenter language
     * Set new or get existing presenter instance
     *
     * @param $lang
     * @return mixed
     * @throws PresenterException
     */
    public function present($lang = null)
    {
        if ( ! $this->presenter || ! class_exists($this->presenter)) {
            throw new PresenterException('Please set the $presenter property to your presenter path.');
        }

        if ( ! $this->presenterInstance) {
            $this->presenterInstance = new $this->presenter($this, $lang);
        }

        return $this->presenterInstance;
    }
}
