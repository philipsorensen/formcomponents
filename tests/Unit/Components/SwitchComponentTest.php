<?php

namespace PhilipSorensen\FormComponents\Tests\Unit\Components;

use PhilipSorensen\FormComponents\Tests\TestCase;

class SwitchComponentTest extends TestCase
{
    public function test_renders_basic_switch(): void
    {
        $view = $this->blade('<x-formcomponents::switch id="notifications" name="Enable notifications" />');

        $view->assertSee('<input', false);
        $view->assertSee('id="notifications"', false);
        $view->assertSee('name="notifications"', false);
        $view->assertSee('type="checkbox"', false);
        $view->assertSee('form-check-input', false);
        $view->assertSee('value="1"', false);
    }

    public function test_has_form_switch_class(): void
    {
        $view = $this->blade('<x-formcomponents::switch id="notifications" name="Enable notifications" />');

        $view->assertSee('form-switch', false);
    }

    public function test_renders_hidden_field_for_unchecked_state(): void
    {
        $view = $this->blade('<x-formcomponents::switch id="notifications" name="Enable notifications" />');

        $view->assertSee('type="hidden"', false);
        $view->assertSee('value="0"', false);
    }

    public function test_renders_label(): void
    {
        $view = $this->blade('<x-formcomponents::switch id="notifications" name="Enable notifications" />');

        $view->assertSee('<label', false);
        $view->assertSee('for="notifications"', false);
        $view->assertSee('Enable notifications', false);
    }

    public function test_renders_checked_when_checked_is_true(): void
    {
        $view = $this->blade('<x-formcomponents::switch id="notifications" name="Enable notifications" :checked="1" />');

        $view->assertSee('checked', false);
    }

    public function test_renders_unchecked_by_default(): void
    {
        $html = (string) $this->blade('<x-formcomponents::switch id="notifications" name="Enable notifications" />');

        // Remove form-check from string before checking for 'checked'
        $this->assertStringNotContainsString('checked', preg_replace('/form-check[^"]*/', '', $html));
    }

    public function test_applies_custom_column_class(): void
    {
        $view = $this->blade('<x-formcomponents::switch id="notifications" name="Enable notifications" col="col-6" />');

        $view->assertSee('col-6', false);
        $view->assertSee('mb-3', false);
    }

    public function test_applies_default_column_class(): void
    {
        $view = $this->blade('<x-formcomponents::switch id="notifications" name="Enable notifications" />');

        $view->assertSee('col-12', false);
        $view->assertSee('mb-3', false);
    }
}
