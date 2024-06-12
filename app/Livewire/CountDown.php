<?php

namespace App\Livewire;

use Livewire\Component;

class CountDown extends Component
{
    public $start = 3;

    public function begin()
    {
        while ($this->start >= 0) {
            // Stream the current count to the browser...
            $this->stream(
                to: 'count',
                content: $this->start,
                replace: true,
            );

            // Pause for 1 second between numbers...
            sleep(1);

            // Decrement the counter...
            $this->start = $this->start - 1;
        };
    }

    public function render()
    {
        return <<<'HTML'
        <div class="wrapper w-full md:max-w-5xl mx-auto pt-20 px-4">
        <h2 class="text-3xl font-semibold">Count Down</h2>
            <button wire:click="begin" class="bg-blue-500 hover:bg-blue-700
            text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline">Start</button>
            <h1 class="text-3xl">Count: <span wire:stream="count">{{ $start }}</span></h1>
        </div>
        HTML;
    }
}
