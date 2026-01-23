<?php

namespace PhilipSorensen\FormComponents\Tests\Unit\Components;

use PhilipSorensen\FormComponents\Tests\TestCase;

class SelectComponentTest extends TestCase
{
    public function test_renders_basic_select(): void
    {
        $view = $this->blade('<x-formcomponents::select id="country"><option value="us">USA</option></x-formcomponents::select>');

        $view->assertSee('<select', false);
        $view->assertSee('id="country"', false);
        $view->assertSee('name="country"', false);
        $view->assertSee('form-select', false);
        $view->assertSee('<option value="us">USA</option>', false);
    }

    public function test_renders_with_label_when_name_provided(): void
    {
        $view = $this->blade('<x-formcomponents::select id="country" name="Country"><option value="us">USA</option></x-formcomponents::select>');

        $view->assertSee('<label', false);
        $view->assertSee('for="country"', false);
        $view->assertSee('Country', false);
    }

    public function test_does_not_render_label_when_name_not_provided(): void
    {
        $view = $this->blade('<x-formcomponents::select id="country"><option value="us">USA</option></x-formcomponents::select>');

        $view->assertDontSee('<label', false);
    }

    public function test_renders_default_disabled_option(): void
    {
        $view = $this->blade('<x-formcomponents::select id="country" default="Select a country"><option value="us">USA</option></x-formcomponents::select>');

        $view->assertSee('<option disabled>Select a country</option>', false);
    }

    public function test_does_not_render_default_option_when_not_provided(): void
    {
        $view = $this->blade('<x-formcomponents::select id="country"><option value="us">USA</option></x-formcomponents::select>');

        $view->assertDontSee('<option disabled>', false);
    }

    public function test_applies_custom_column_class(): void
    {
        $view = $this->blade('<x-formcomponents::select id="country" col="col-6"><option value="us">USA</option></x-formcomponents::select>');

        $view->assertSee('col-6', false);
        $view->assertSee('mb-3', false);
    }

    public function test_applies_default_column_class(): void
    {
        $view = $this->blade('<x-formcomponents::select id="country"><option value="us">USA</option></x-formcomponents::select>');

        $view->assertSee('col-12', false);
        $view->assertSee('mb-3', false);
    }

    public function test_shows_error_class_when_validation_fails(): void
    {
        $this->withViewErrors(['country' => 'Please select a country.']);

        $view = $this->blade('<x-formcomponents::select id="country"><option value="us">USA</option></x-formcomponents::select>');

        $view->assertSee('is-invalid', false);
        $view->assertSee('invalid-feedback', false);
        $view->assertSee('Please select a country.', false);
    }

    public function test_renders_tooltip_when_url_provided(): void
    {
        $view = $this->blade('<x-formcomponents::select id="country" tooltip="https://example.com/help"><option value="us">USA</option></x-formcomponents::select>');

        $view->assertSee('<a', false);
        $view->assertSee('href="https://example.com/help"', false);
        $view->assertSee('target="_blank"', false);
    }

    public function test_merges_additional_attributes(): void
    {
        $view = $this->blade('<x-formcomponents::select id="country" required disabled><option value="us">USA</option></x-formcomponents::select>');

        $view->assertSee('required', false);
        $view->assertSee('disabled', false);
    }

    public function test_renders_slot_content(): void
    {
        $view = $this->blade('
            <x-formcomponents::select id="country">
                <option value="us">USA</option>
                <option value="ca">Canada</option>
                <option value="uk">UK</option>
            </x-formcomponents::select>
        ');

        $view->assertSee('<option value="us">USA</option>', false);
        $view->assertSee('<option value="ca">Canada</option>', false);
        $view->assertSee('<option value="uk">UK</option>', false);
    }
}
