<?php namespace SteveAzz\Presenters;


use SteveAzz\Presenters\Exceptions\PresenterException;

trait PresentableTrait
{

    public $presenterInstance;

    public function present()
    {
        if (!$this->presenter || !class_exists($this->presenter)) {
            throw new PresenterException('Please set the $presenter property to a correct class inside of the your class');
        }

        if (!$this->presenterInstance) {
            $this->presenterInstance = new $this->presenter($this);
        }

        return $this->presenterInstance;
    }
}
