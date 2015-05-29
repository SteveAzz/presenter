<?php

namespace spec\SteveAzz\Presenter;

use Mockery;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use SteveAzz\Presenters\PresentableTrait;

class PresentableTraitSpec extends ObjectBehavior
{

    function let()
    {
        $this->beAnInstanceOf('spec\SteveAzz\Presenter\Foo');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('spec\SteveAzz\Presenter\Foo');
    }

    function it_fetches_a_valid_presenter()
    {
        Mockery::mock('FooPresenter');
        $this->present()->shouldBeAnInstanceOf('FooPresenter');
    }

    function it_throws_exception_if_invalid_presenter()
    {
        $this->presenter = 'Invalid';

        $this->shouldThrow('SteveAzz\Presenters\Exceptions\PresenterException')->duringPresent();
    }

    function it_caches_the_presenter_for_future_use()
    {
        Mockery::mock('FooPresenter');

        $firstInstance = $this->present();
        $secondInstance = $this->present();

        $firstInstance->shouldBe($secondInstance);
    }
}

class Foo
{

    use PresentableTrait;

    public $presenter = 'FooPresenter';

}
