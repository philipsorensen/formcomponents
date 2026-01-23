<?php

namespace PhilipSorensen\FormComponents\Tests\Unit\Components;

use PhilipSorensen\FormComponents\Tests\TestCase;

class EmailComponentTest extends TestCase
{
    public function test_renders_basic_email_input(): void
    {
        $view = $this->blade('<x-formcomponents::email id="email" />');

        $view->assertSee('<input', false);
        $view->assertSee('id="email"', false);
        $view->assertSee('name="email"', false);
        $view->assertSee('type="email"', false);
        $view->assertSee('form-control', false);
    }

    public function test_has_email_inputmode(): void
    {
        $view = $this->blade('<x-formcomponents::email id="email" />');

        $view->assertSee('inputmode="email"', false);
    }

    public function test_renders_with_label_when_name_provided(): void
    {
        $view = $this->blade('<x-formcomponents::email id="email" name="Email Address" />');

        $view->assertSee('<label', false);
        $view->assertSee('for="email"', false);
        $view->assertSee('Email Address', false);
    }

    public function test_does_not_render_label_when_name_not_provided(): void
    {
        $view = $this->blade('<x-formcomponents::email id="email" />');

        $view->assertDontSee('<label', false);
    }

    public function test_applies_custom_column_class(): void
    {
        $view = $this->blade('<x-formcomponents::email id="email" col="col-6" />');

        $view->assertSee('col-6', false);
        $view->assertSee('mb-3', false);
    }

    public function test_applies_default_column_class(): void
    {
        $view = $this->blade('<x-formcomponents::email id="email" />');

        $view->assertSee('col-12', false);
        $view->assertSee('mb-3', false);
    }

    public function test_shows_error_class_when_validation_fails(): void
    {
        $this->withViewErrors(['email' => 'The email must be a valid email address.']);

        $view = $this->blade('<x-formcomponents::email id="email" />');

        $view->assertSee('is-invalid', false);
        $view->assertSee('invalid-feedback', false);
        $view->assertSee('The email must be a valid email address.', false);
    }

    public function test_renders_tooltip_when_url_provided(): void
    {
        $view = $this->blade('<x-formcomponents::email id="email" tooltip="https://example.com/help" />');

        $view->assertSee('<a', false);
        $view->assertSee('href="https://example.com/help"', false);
        $view->assertSee('target="_blank"', false);
    }

    public function test_uses_placeholder_from_name(): void
    {
        $view = $this->blade('<x-formcomponents::email id="email" name="Email Address" />');

        $view->assertSee('placeholder="Email Address"', false);
    }

    public function test_preserves_old_input_value(): void
    {
        $this->app['request']->setLaravelSession(
            $this->app['session.store']
        );
        $this->app['session.store']->put('_old_input', ['email' => 'old@example.com']);

        $view = $this->blade('<x-formcomponents::email id="email" />');

        $view->assertSee('value="old@example.com"', false);
    }

    public function test_merges_additional_attributes(): void
    {
        $view = $this->blade('<x-formcomponents::email id="email" required autocomplete="email" />');

        $view->assertSee('required', false);
        $view->assertSee('autocomplete="email"', false);
    }
}
