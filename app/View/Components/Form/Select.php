<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Select extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public readonly string $name,
        public readonly ?string $label=null,
        public readonly string $placeholder='Selectionner...',
        public readonly array $options = [],
        public readonly bool $required = false,
        public readonly int|string|null $selected = null,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.select');
    }
}
