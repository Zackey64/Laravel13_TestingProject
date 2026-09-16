<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use League\CommonMark\CommonMarkConverter;

class Markdown extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct( public string $content )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $converter = new CommonMarkConverter();
        return view('components.markdown', [
            'html' => $converter->convert($this->content),
        ]);
    }
}
