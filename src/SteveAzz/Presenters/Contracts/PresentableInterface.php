<?php namespace SteveAzz\Presenters\Contracts;


interface PresentableInterface
{

    /**
     * Present a string into the desired format.
     *
     * @return mixed
     */
    public function present();

}