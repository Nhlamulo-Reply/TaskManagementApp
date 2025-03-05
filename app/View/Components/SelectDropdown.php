<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SelectDropdown extends Component
{
    public $name;
    public $options;
    public $selected;
    public $label;
    public $placeholder;

    public function __construct($name, $options = [], $selected = null, $label = '', $placeholder = 'Select an option')
    {
        $this->name = $name;
        $this->options = $options;
        $this->selected = $selected;
        $this->label = $label;
        $this->placeholder = $placeholder;
    }

    public function render()
    {
        return view('components.select-dropdown');
    }
}
