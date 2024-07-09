<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Livewire\Cart;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CartTest extends TestCase
{
    /** @test */
    public function can_load_discount_token_from_a_cookie()
    {
        Livewire::withCookies(['discountToken' => 'TestCookie '])
            ->test(Cart::class)
            ->assertSet('discountToken', 'TestCookie ');
    }
}
