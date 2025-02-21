<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RegisterButton extends Component
{
    public $color;

    /**
     * Create a new component instance.
     *
     * @param string $color
     */
    public function __construct($color = 'gray')
    {
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.register-button');
    }
}
