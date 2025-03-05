<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UserSelectDropdown extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     *
     *
     */

    public $users;

    public $selected;
    public function __construct( $users , $selected = null)
    {
        $this->selected = $selected;
        $this->users  = $users;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user-select-dropdown');
    }
}
