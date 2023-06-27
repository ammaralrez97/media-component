<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class MediaComponent extends Component
{
    public string $name;
    public string $multi;
    public string $values;
    public string $id;

    /**
     * Create a new component instance.
     */
    public function __construct(string $name, $values = null, $multi = null, $id = null)
    {
        $this->name = $name;
        $this->values = isset($values) ? $values : (isset($multi) ? json_encode([]) : "");
        $this->id = $id ?? 'id' . Str::random(15);
        $this->multi = isset($multi) ? 'true' : 'false';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public
    function render(): View|Closure|string
    {
        return view('components.media-component');
    }
}
