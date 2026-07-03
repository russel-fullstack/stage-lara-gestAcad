<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatCard extends Component
{

    private const VALUES_COLORS = [
        'gray' => 'text-gray-900',
        'green' => 'text-green-600',
        'amber' => 'text-amber-600',
        'red' => 'text-red-600',
    ];

    public readonly string $valueColor;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public readonly string $label,
        public readonly string $value,
        public readonly string $color = 'gray',
    )
    {
        $this->valueColor = self::VALUES_COLORS[$color] ?? self::VALUES_COLORS['gray'];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.stat-card');
    }
}
