<?php

namespace App\View\Components;

use Illuminate\View\Component;

class companySearchComponent extends Component
{
    public $companys;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($companys)
    {
        $this->companys=$companys;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.company-search-component')->with(['companys'=>$this->companys]);
    }
}
