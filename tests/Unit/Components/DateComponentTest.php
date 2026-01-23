<?php

namespace PhilipSorensen\FormComponents\Tests\Unit\Components;

use PhilipSorensen\FormComponents\Tests\TestCase;

class DateComponentTest extends TestCase
{
    public function test_renders_basic_date_input(): void
    {
        $view = $this->blade('<x-formcomponents::date id="birthday" />');

        $view->assertSee('<input', false);
        $view->assertSee('id="birthday"', false);
        $view->assertSee('name="birthday"', false);
        $view->assertSee('type="date"', false);
        $view->assertSee('form-control', false);
    }

    public function test_renders_with_label_when_name_provided(): void
    {
        $view = $this->blade('<x-formcomponents::date id="birthday" name="Birthday" />');

        $view->assertSee('<label', false);
        $view->assertSee('for="birthday"', false);
        $view->assertSee('Birthday', false);
    }

    public function test_does_not_render_label_when_name_not_provided(): void
    {
        $view = $this->blade('<x-formcomponents::date id="birthday" />');

        $view->assertDontSee('<label', false);
    }

    public function test_applies_custom_column_class(): void
    {
        $view = $this->blade('<x-formcomponents::date id="birthday" col="col-6" />');

        $view->assertSee('col-6', false);
        $view->assertSee('mb-3', false);
    }

    public function test_applies_default_column_class(): void
    {
        $view = $this->blade('<x-formcomponents::date id="birthday" />');

        $view->assertSee('col-12', false);
        $view->assertSee('mb-3', false);
    }

    public function test_shows_error_class_when_validation_fails(): void
    {
        $this->withViewErrors(['birthday' => 'Please enter a valid date.']);

        $view = $this->blade('<x-formcomponents::date id="birthday" />');

        $view->assertSee('is-invalid', false);
        $view->assertSee('invalid-feedback', false);
        $view->assertSee('Please enter a valid date.', false);
    }

    public function test_renders_tooltip_when_url_provided(): void
    {
        $view = $this->blade('<x-formcomponents::date id="birthday" tooltip="https://example.com/help" />');

        $view->assertSee('<a', false);
        $view->assertSee('href="https://example.com/help"', false);
        $view->assertSee('target="_blank"', false);
    }

    public function test_uses_placeholder_from_name(): void
    {
        $view = $this->blade('<x-formcomponents::date id="birthday" name="Birthday" />');

        $view->assertSee('placeholder="Birthday"', false);
    }

    public function test_preserves_old_input_value(): void
    {
        $this->app['request']->setLaravelSession(
            $this->app['session.store']
        );
        $this->app['session.store']->put('_old_input', ['birthday' => '1990-05-15']);

        $view = $this->blade('<x-formcomponents::date id="birthday" />');

        $view->assertSee('value="1990-05-15"', false);
    }

    public function test_merges_additional_attributes(): void
    {
        $view = $this->blade('<x-formcomponents::date id="birthday" required min="1900-01-01" max="2025-12-31" />');

        $view->assertSee('required', false);
        $view->assertSee('min="1900-01-01"', false);
        $view->assertSee('max="2025-12-31"', false);
    }
}
