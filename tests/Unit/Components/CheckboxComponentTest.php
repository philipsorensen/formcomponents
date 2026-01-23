<?php

namespace PhilipSorensen\FormComponents\Tests\Unit\Components;

use PhilipSorensen\FormComponents\Tests\TestCase;

class CheckboxComponentTest extends TestCase
{
    public function test_renders_basic_checkbox(): void
    {
        $view = $this->blade('<x-formcomponents::checkbox id="agree" name="I agree" />');

        $view->assertSee('<input', false);
        $view->assertSee('id="agree"', false);
        $view->assertSee('name="agree"', false);
        $view->assertSee('type="checkbox"', false);
        $view->assertSee('form-check-input', false);
        $view->assertSee('value="1"', false);
    }

    public function test_renders_hidden_field_for_unchecked_state(): void
    {
        $view = $this->blade('<x-formcomponents::checkbox id="agree" name="I agree" />');

        $view->assertSee('type="hidden"', false);
        $view->assertSee('value="0"', false);
    }

    public function test_renders_label(): void
    {
        $view = $this->blade('<x-formcomponents::checkbox id="agree" name="I agree to terms" />');

        $view->assertSee('<label', false);
        $view->assertSee('for="agree"', false);
        $view->assertSee('I agree to terms', false);
        $view->assertSee('form-check-label', false);
    }

    public function test_renders_checked_when_checked_is_true(): void
    {
        $view = $this->blade('<x-formcomponents::checkbox id="agree" name="I agree" :checked="1" />');

        $view->assertSee('checked', false);
    }

    public function test_renders_unchecked_by_default(): void
    {
        $html = (string) $this->blade('<x-formcomponents::checkbox id="agree" name="I agree" />');

        // Count occurrences of 'checked' - should not have the checked attribute
        $this->assertStringNotContainsString('checked', preg_replace('/form-check[^"]*/', '', $html));
    }

    public function test_applies_custom_column_class(): void
    {
        $view = $this->blade('<x-formcomponents::checkbox id="agree" name="I agree" col="col-6" />');

        $view->assertSee('col-6', false);
        $view->assertSee('mb-3', false);
    }

    public function test_applies_default_column_class(): void
    {
        $view = $this->blade('<x-formcomponents::checkbox id="agree" name="I agree" />');

        $view->assertSee('col-12', false);
        $view->assertSee('mb-3', false);
    }

    public function test_has_form_check_wrapper(): void
    {
        $view = $this->blade('<x-formcomponents::checkbox id="agree" name="I agree" />');

        $view->assertSee('form-check', false);
    }

    public function test_shows_error_class_when_validation_fails(): void
    {
        $this->withViewErrors(['agree' => 'You must agree to continue.']);

        $view = $this->blade('<x-formcomponents::checkbox id="agree" name="I agree" />');

        $view->assertSee('is-invalid', false);
        $view->assertSee('invalid-feedback', false);
        $view->assertSee('You must agree to continue.', false);
    }
}
