<?php

namespace PhilipSorensen\FormComponents\Tests\Unit\Components;

use PhilipSorensen\FormComponents\Tests\TestCase;

class OptionComponentTest extends TestCase
{
    public function test_renders_basic_option(): void
    {
        $view = $this->blade('<x-formcomponents::option value="us">United States</x-formcomponents::option>');

        $view->assertSee('<option', false);
        $view->assertSee('value="us"', false);
        $view->assertSee('United States', false);
        $view->assertSee('</option>', false);
    }

    public function test_renders_empty_option(): void
    {
        $view = $this->blade('<x-formcomponents::option></x-formcomponents::option>');

        $view->assertSee('<option', false);
        $view->assertSee('</option>', false);
    }

    public function test_merges_additional_attributes(): void
    {
        $view = $this->blade('<x-formcomponents::option value="us" selected disabled>United States</x-formcomponents::option>');

        $view->assertSee('value="us"', false);
        $view->assertSee('selected', false);
        $view->assertSee('disabled', false);
    }

    public function test_renders_slot_content(): void
    {
        $view = $this->blade('<x-formcomponents::option value="special"><strong>Special</strong> Option</x-formcomponents::option>');

        $view->assertSee('<strong>Special</strong> Option', false);
    }

    public function test_works_inside_select_component(): void
    {
        $view = $this->blade('
            <x-formcomponents::select id="country">
                <x-formcomponents::option value="us">USA</x-formcomponents::option>
                <x-formcomponents::option value="ca">Canada</x-formcomponents::option>
            </x-formcomponents::select>
        ');

        $view->assertSee('<select', false);
        $view->assertSee('<option', false);
        $view->assertSee('value="us"', false);
        $view->assertSee('USA', false);
        $view->assertSee('value="ca"', false);
        $view->assertSee('Canada', false);
    }

    public function test_can_have_data_attributes(): void
    {
        $view = $this->blade('<x-formcomponents::option value="us" data-code="USA">United States</x-formcomponents::option>');

        $view->assertSee('data-code="USA"', false);
    }
}
