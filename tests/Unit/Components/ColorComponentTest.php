<?php

namespace PhilipSorensen\FormComponents\Tests\Unit\Components;

use PhilipSorensen\FormComponents\Tests\TestCase;

class ColorComponentTest extends TestCase
{
    public function test_renders_basic_color_input(): void
    {
        $view = $this->blade('<x-formcomponents::color id="theme_color" />');

        $view->assertSee('<input', false);
        $view->assertSee('id="theme_color"', false);
        $view->assertSee('name="theme_color"', false);
        $view->assertSee('type="color"', false);
        $view->assertSee('form-control', false);
    }

    public function test_renders_with_label_when_name_provided(): void
    {
        $view = $this->blade('<x-formcomponents::color id="theme_color" name="Theme Color" />');

        $view->assertSee('<label', false);
        $view->assertSee('for="theme_color"', false);
        $view->assertSee('Theme Color', false);
    }

    public function test_does_not_render_label_when_name_not_provided(): void
    {
        $view = $this->blade('<x-formcomponents::color id="theme_color" />');

        $view->assertDontSee('<label', false);
    }

    public function test_applies_custom_column_class(): void
    {
        $view = $this->blade('<x-formcomponents::color id="theme_color" col="col-6" />');

        $view->assertSee('col-6', false);
        $view->assertSee('mb-3', false);
    }

    public function test_applies_default_column_class(): void
    {
        $view = $this->blade('<x-formcomponents::color id="theme_color" />');

        $view->assertSee('col-12', false);
        $view->assertSee('mb-3', false);
    }

    public function test_shows_error_class_when_validation_fails(): void
    {
        $this->withViewErrors(['theme_color' => 'Please select a valid color.']);

        $view = $this->blade('<x-formcomponents::color id="theme_color" />');

        $view->assertSee('is-invalid', false);
        $view->assertSee('invalid-feedback', false);
        $view->assertSee('Please select a valid color.', false);
    }

    public function test_renders_tooltip_when_url_provided(): void
    {
        $view = $this->blade('<x-formcomponents::color id="theme_color" tooltip="https://example.com/help" />');

        $view->assertSee('<a', false);
        $view->assertSee('href="https://example.com/help"', false);
        $view->assertSee('target="_blank"', false);
    }

    public function test_uses_placeholder_from_name(): void
    {
        $view = $this->blade('<x-formcomponents::color id="theme_color" name="Theme Color" />');

        $view->assertSee('placeholder="Theme Color"', false);
    }

    public function test_preserves_old_input_value(): void
    {
        $this->app['request']->setLaravelSession(
            $this->app['session.store']
        );
        $this->app['session.store']->put('_old_input', ['theme_color' => '#ff5733']);

        $view = $this->blade('<x-formcomponents::color id="theme_color" />');

        $view->assertSee('value="#ff5733"', false);
    }

    public function test_renders_javascript_for_color_picker(): void
    {
        $view = $this->blade('<x-formcomponents::color id="theme_color" />');

        $view->assertSee('<script>', false);
        $view->assertSee("getElementById('theme_color')", false);
        $view->assertSee('addEventListener', false);
    }

    public function test_merges_additional_attributes(): void
    {
        $view = $this->blade('<x-formcomponents::color id="theme_color" required />');

        $view->assertSee('required', false);
    }
}
