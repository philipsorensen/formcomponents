<?php

namespace PhilipSorensen\FormComponents\Tests\Unit\Components;

use PhilipSorensen\FormComponents\Tests\TestCase;

class TextareaComponentTest extends TestCase
{
    public function test_renders_basic_textarea(): void
    {
        $view = $this->blade('<x-formcomponents::text id="description" />');

        $view->assertSee('<textarea', false);
        $view->assertSee('id="description"', false);
        $view->assertSee('name="description"', false);
        $view->assertSee('form-control', false);
    }

    public function test_renders_with_label_when_name_provided(): void
    {
        $view = $this->blade('<x-formcomponents::text id="description" name="Description" />');

        $view->assertSee('<label', false);
        $view->assertSee('for="description"', false);
        $view->assertSee('Description', false);
    }

    public function test_does_not_render_label_when_name_not_provided(): void
    {
        $view = $this->blade('<x-formcomponents::text id="description" />');

        $view->assertDontSee('<label', false);
    }

    public function test_has_default_rows_attribute(): void
    {
        $view = $this->blade('<x-formcomponents::text id="description" />');

        $view->assertSee('rows="12"', false);
    }

    public function test_can_override_rows_attribute(): void
    {
        $view = $this->blade('<x-formcomponents::text id="description" rows="5" />');

        $view->assertSee('rows="5"', false);
    }

    public function test_applies_custom_column_class(): void
    {
        $view = $this->blade('<x-formcomponents::text id="description" col="col-6" />');

        $view->assertSee('col-6', false);
        $view->assertSee('mb-3', false);
    }

    public function test_applies_default_column_class(): void
    {
        $view = $this->blade('<x-formcomponents::text id="description" />');

        $view->assertSee('col-12', false);
        $view->assertSee('mb-3', false);
    }

    public function test_shows_error_class_when_validation_fails(): void
    {
        $this->withViewErrors(['description' => 'The description field is required.']);

        $view = $this->blade('<x-formcomponents::text id="description" />');

        $view->assertSee('is-invalid', false);
        $view->assertSee('invalid-feedback', false);
        $view->assertSee('The description field is required.', false);
    }

    public function test_renders_tooltip_when_url_provided(): void
    {
        $view = $this->blade('<x-formcomponents::text id="description" tooltip="https://example.com/help" />');

        $view->assertSee('<a', false);
        $view->assertSee('href="https://example.com/help"', false);
        $view->assertSee('target="_blank"', false);
    }

    public function test_renders_value_when_provided(): void
    {
        $view = $this->blade('<x-formcomponents::text id="description" value="Default text" />');

        $view->assertSee('Default text', false);
    }

    public function test_preserves_old_input_value(): void
    {
        $this->app['request']->setLaravelSession(
            $this->app['session.store']
        );
        $this->app['session.store']->put('_old_input', ['description' => 'Old description text']);

        $view = $this->blade('<x-formcomponents::text id="description" />');

        $view->assertSee('Old description text', false);
    }

    public function test_merges_additional_attributes(): void
    {
        $view = $this->blade('<x-formcomponents::text id="description" required placeholder="Enter description" />');

        $view->assertSee('required', false);
        $view->assertSee('placeholder="Enter description"', false);
    }
}
