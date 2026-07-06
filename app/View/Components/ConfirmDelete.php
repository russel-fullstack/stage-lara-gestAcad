<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ConfirmDelete extends Component
{
    /**
     * Create a new component instance.
     */
    public readonly string $id;
    public function __construct(
        public readonly string $action= '',
        public readonly string $message= 'Êtes-vous sûr de vouloir supprimer cet élément ?',
        public readonly string $label = 'Supprimer',
    )
    {
       $this->id = md5($this->action);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.confirm-delete');
    }
}
