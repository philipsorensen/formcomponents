<?php

namespace PhilipSorensen\FormComponents\Tests\Unit\Components;

use PhilipSorensen\FormComponents\Tests\TestCase;

class DatetimeComponentTest extends TestCase
{
    public function test_renders_basic_datetime_input(): void
    {
        $view = $this->blade('<x-formcomponents::datetime id="appointment" />');

        $view->assertSee('<input', false);
        $view->assertSee('id="appointment"', false);
        $view->assertSee('name="appointment"', false);
        $view->assertSee('type="datetime-local"', false);
        $view->assertSee('form-control', false);
    }

    public function test_renders_with_label_when_name_provided(): void
    {
        $view = $this->blade('<x-formcomponents::datetime id="appointment" name="Appointment" />');

        $view->assertSee('<label', false);
        $view->assertSee('for="appointment"', false);
        $view->assertSee('Appointment', false);
    }

    public function test_does_not_render_label_when_name_not_provided(): void
    {
        $view = $this->blade('<x-formcomponents::datetime id="appointment" />');

        $view->assertDontSee('<label', false);
    }

    public function test_has_default_min_max_values(): void
    {
        $view = $this->blade('<x-formcomponents::datetime id="appointment" />');

        $view->assertSee('min="2018-06-30T16:30"', false);
        $view->assertSee('max="2028-06-30T16:30"', false);
    }

    public function test_can_override_min_max_values(): void
    {
        $view = $this->blade('<x-formcomponents::datetime id="appointment" min="2020-01-01T00:00" max="2030-12-31T23:59" />');

        $view->assertSee('min="2020-01-01T00:00"', false);
        $view->assertSee('max="2030-12-31T23:59"', false);
    }

    public function test_has_pattern_attribute(): void
    {
        $view = $this->blade('<x-formcomponents::datetime id="appointment" />');

        $view->assertSee('pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}"', false);
    }

    public function test_applies_custom_column_class(): void
    {
        $view = $this->blade('<x-formcomponents::datetime id="appointment" col="col-6" />');

        $view->assertSee('col-6', false);
        $view->assertSee('mb-3', false);
    }

    public function test_applies_default_column_class(): void
    {
        $view = $this->blade('<x-formcomponents::datetime id="appointment" />');

        $view->assertSee('col-12', false);
        $view->assertSee('mb-3', false);
    }

    public function test_shows_error_class_when_validation_fails(): void
    {
        $this->withViewErrors(['appointment' => 'Please enter a valid date and time.']);

        $view = $this->blade('<x-formcomponents::datetime id="appointment" />');

        $view->assertSee('is-invalid', false);
        $view->assertSee('invalid-feedback', false);
        $view->assertSee('Please enter a valid date and time.', false);
    }

    public function test_renders_tooltip_when_url_provided(): void
    {
        $view = $this->blade('<x-formcomponents::datetime id="appointment" tooltip="https://example.com/help" />');

        $view->assertSee('<a', false);
        $view->assertSee('href="https://example.com/help"', false);
        $view->assertSee('target="_blank"', false);
    }

    public function test_preserves_old_input_value(): void
    {
        $this->app['request']->setLaravelSession(
            $this->app['session.store']
        );
        $this->app['session.store']->put('_old_input', ['appointment' => '2024-05-15T14:30']);

        $view = $this->blade('<x-formcomponents::datetime id="appointment" />');

        $view->assertSee('value="2024-05-15T14:30"', false);
    }
}
