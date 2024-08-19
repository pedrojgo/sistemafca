<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AttendanceTable extends Component
{
    public $attendances;

    /**
     * Create a new component instance.
     *
     * @param $attendances
     */
    public function __construct($attendances)
    {
        $this->attendances = $attendances;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('components.attendances-table');
    }
}
