<?php

namespace PhilipSorensen\FormComponents\Tests\Unit\Components;

use PhilipSorensen\FormComponents\Tests\TestCase;

class ErrorComponentTest extends TestCase
{
    public function test_does_not_render_when_no_error(): void
    {
        $view = $this->blade('<x-formcomponents::error name="email" />');

        $view->assertDontSee('<span', false);
        $view->assertDontSee('invalid-feedback', false);
    }

    public function test_renders_error_message_when_validation_fails(): void
    {
        $this->withViewErrors(['email' => 'The email field is required.']);

        $view = $this->blade('<x-formcomponents::error name="email" />');

        $view->assertSee('<span', false);
        $view->assertSee('invalid-feedback', false);
        $view->assertSee('role="alert"', false);
        $view->assertSee('<strong>The email field is required.</strong>', false);
    }

    public function test_applies_error_class_from_config(): void
    {
        $this->withViewErrors(['email' => 'Error message']);

        $view = $this->blade('<x-formcomponents::error name="email" />');

        $view->assertSee('invalid-feedback', false);
    }

    public function test_renders_only_for_matching_field(): void
    {
        $this->withViewErrors(['password' => 'The password field is required.']);

        $view = $this->blade('<x-formcomponents::error name="email" />');

        $view->assertDontSee('invalid-feedback', false);
        $view->assertDontSee('The password field is required.', false);
    }

    public function test_renders_error_for_array_fields(): void
    {
        $this->withViewErrors(['items.0.name' => 'The item name is required.']);

        $view = $this->blade('<x-formcomponents::error name="items.0.name" />');

        $view->assertSee('invalid-feedback', false);
        $view->assertSee('The item name is required.', false);
    }
}
