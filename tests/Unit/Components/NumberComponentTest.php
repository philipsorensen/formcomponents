<?php

namespace PhilipSorensen\FormComponents\Tests\Unit\Components;

use PhilipSorensen\FormComponents\Tests\TestCase;

class NumberComponentTest extends TestCase
{
    public function test_renders_basic_number_input(): void
    {
        $view = $this->blade('<x-formcomponents::number id="quantity" />');

        $view->assertSee('<input', false);
        $view->assertSee('id="quantity"', false);
        $view->assertSee('name="quantity"', false);
        $view->assertSee('type="number"', false);
        $view->assertSee('form-control', false);
    }

    public function test_has_rtl_direction(): void
    {
        $view = $this->blade('<x-formcomponents::number id="quantity" />');

        $view->assertSee('dir="rtl"', false);
    }

    public function test_renders_with_label_when_name_provided(): void
    {
        $view = $this->blade('<x-formcomponents::number id="quantity" name="Quantity" />');

        $view->assertSee('<label', false);
        $view->assertSee('for="quantity"', false);
        $view->assertSee('Quantity', false);
    }

    public function test_does_not_render_label_when_name_not_provided(): void
    {
        $view = $this->blade('<x-formcomponents::number id="quantity" />');

        $view->assertDontSee('<label', false);
    }

    public function test_applies_custom_column_class(): void
    {
        $view = $this->blade('<x-formcomponents::number id="quantity" col="col-6" />');

        $view->assertSee('col-6', false);
        $view->assertSee('mb-3', false);
    }

    public function test_applies_default_column_class(): void
    {
        $view = $this->blade('<x-formcomponents::number id="quantity" />');

        $view->assertSee('col-12', false);
        $view->assertSee('mb-3', false);
    }

    public function test_shows_error_class_when_validation_fails(): void
    {
        $this->withViewErrors(['quantity' => 'The quantity must be a number.']);

        $view = $this->blade('<x-formcomponents::number id="quantity" />');

        $view->assertSee('is-invalid', false);
        $view->assertSee('invalid-feedback', false);
        $view->assertSee('The quantity must be a number.', false);
    }

    public function test_renders_tooltip_when_url_provided(): void
    {
        $view = $this->blade('<x-formcomponents::number id="quantity" tooltip="https://example.com/help" />');

        $view->assertSee('<a', false);
        $view->assertSee('href="https://example.com/help"', false);
        $view->assertSee('target="_blank"', false);
    }

    public function test_uses_placeholder_from_name(): void
    {
        $view = $this->blade('<x-formcomponents::number id="quantity" name="Quantity" />');

        $view->assertSee('placeholder="Quantity"', false);
    }

    public function test_preserves_old_input_value(): void
    {
        $this->app['request']->setLaravelSession(
            $this->app['session.store']
        );
        $this->app['session.store']->put('_old_input', ['quantity' => '42']);

        $view = $this->blade('<x-formcomponents::number id="quantity" />');

        $view->assertSee('value="42"', false);
    }

    public function test_merges_additional_attributes(): void
    {
        $view = $this->blade('<x-formcomponents::number id="quantity" required min="0" max="100" step="1" />');

        $view->assertSee('required', false);
        $view->assertSee('min="0"', false);
        $view->assertSee('max="100"', false);
        $view->assertSee('step="1"', false);
    }
}
