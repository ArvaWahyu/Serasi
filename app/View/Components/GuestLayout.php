<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class GuestLayout extends Component
{
    /**
     * The page title.
     *
     * @var string|null
     */
    public $title;

    /**
     * Create a new component instance.
     *
     * @param string|null $title
     * @return void
     */
    public function __construct(?string $title = null)
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.guest', ['title' => $this->title]);
    }
}
