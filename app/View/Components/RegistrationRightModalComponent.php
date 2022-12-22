<?php

namespace App\View\Components;

use App\Models\RegistrationRight;
use Illuminate\View\Component;

class RegistrationRightModalComponent extends Component
{
    public RegistrationRight $registrationRight;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($registrationRight)
    {
        $this->registrationRight = $registrationRight;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.registration-right-modal-component')->with(['registrationRight' => $this->registrationRight]);
    }
}
