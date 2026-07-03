<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Bagde extends Component
{
      private const COLORS = [
        'gray' => 'bg-gray-50 text-gray-600 border border-gray-200',
        'green' => 'bg-green-50 text-green-600 border border-green-200',
        'amber' => 'bg-amber-50 text-amber-600 border border-amber-200',
        'red' => 'bg-red-50 text-red-600 border border-red-200',
        'purple' => 'bg-purple-50 text-purple-600 border border-purple-200',
        'black' => 'bg-black text-white',
    ];

    public readonly string $cls;
    /**
     * Create a new component instance.
     */
    public function __construct(
        public readonly string $color = 'gray',
    )
    {
        $this->cls = self::COLORS[$color] ?? self::COLORS['gray'];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.bagde');
    }
}
