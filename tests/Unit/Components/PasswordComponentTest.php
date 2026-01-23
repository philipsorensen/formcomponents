<?php

namespace PhilipSorensen\FormComponents\Tests\Unit\Components;

use PhilipSorensen\FormComponents\Tests\TestCase;

class PasswordComponentTest extends TestCase
{
    public function test_renders_basic_password_input(): void
    {
        $view = $this->blade('<x-formcomponents::password id="password" />');

        $view->assertSee('<input', false);
        $view->assertSee('id="password"', false);
        $view->assertSee('name="password"', false);
        $view->assertSee('type="password"', false);
        $view->assertSee('form-control', false);
    }

    public function test_renders_with_label_when_name_provided(): void
    {
        $view = $this->blade('<x-formcomponents::password id="password" name="Password" />');

        $view->assertSee('<label', false);
        $view->assertSee('for="password"', false);
        $view->assertSee('Password', false);
    }

    public function test_does_not_render_label_when_name_not_provided(): void
    {
        $view = $this->blade('<x-formcomponents::password id="password" />');

        $view->assertDontSee('<label', false);
    }

    public function test_applies_custom_column_class(): void
    {
        $view = $this->blade('<x-formcomponents::password id="password" col="col-6" />');

        $view->assertSee('col-6', false);
        $view->assertSee('mb-3', false);
    }

    public function test_applies_default_column_class(): void
    {
        $view = $this->blade('<x-formcomponents::password id="password" />');

        $view->assertSee('col-12', false);
        $view->assertSee('mb-3', false);
    }

    public function test_shows_error_class_when_validation_fails(): void
    {
        $this->withViewErrors(['password' => 'The password must be at least 8 characters.']);

        $view = $this->blade('<x-formcomponents::password id="password" />');

        $view->assertSee('is-invalid', false);
        $view->assertSee('invalid-feedback', false);
        $view->assertSee('The password must be at least 8 characters.', false);
    }

    public function test_renders_tooltip_when_url_provided(): void
    {
        $view = $this->blade('<x-formcomponents::password id="password" tooltip="https://example.com/help" />');

        $view->assertSee('<a', false);
        $view->assertSee('href="https://example.com/help"', false);
        $view->assertSee('target="_blank"', false);
    }

    public function test_uses_placeholder_from_name(): void
    {
        $view = $this->blade('<x-formcomponents::password id="password" name="Password" />');

        $view->assertSee('placeholder="Password"', false);
    }

    public function test_merges_additional_attributes(): void
    {
        $view = $this->blade('<x-formcomponents::password id="password" required autocomplete="new-password" />');

        $view->assertSee('required', false);
        $view->assertSee('autocomplete="new-password"', false);
    }
}
