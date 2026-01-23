<?php

namespace PhilipSorensen\FormComponents\Tests\Unit\Components;

use PhilipSorensen\FormComponents\Tests\TestCase;

class FileComponentTest extends TestCase
{
    public function test_renders_basic_file_input(): void
    {
        $view = $this->blade('<x-formcomponents::file id="document" />');

        $view->assertSee('<input', false);
        $view->assertSee('id="document"', false);
        $view->assertSee('name="document"', false);
        $view->assertSee('type="file"', false);
        $view->assertSee('form-control', false);
    }

    public function test_has_default_accept_attribute(): void
    {
        $view = $this->blade('<x-formcomponents::file />');

        $view->assertSee('accept="text/plain"', false);
    }

    public function test_can_override_accept_attribute(): void
    {
        $view = $this->blade('<x-formcomponents::file id="document" accept="application/pdf" />');

        $view->assertSee('accept="application/pdf"', false);
    }

    public function test_has_default_id(): void
    {
        $view = $this->blade('<x-formcomponents::file />');

        $view->assertSee('id="file"', false);
        $view->assertSee('name="file"', false);
    }

    public function test_renders_with_label_when_name_provided(): void
    {
        $view = $this->blade('<x-formcomponents::file id="document" name="Upload Document" />');

        $view->assertSee('<label', false);
        $view->assertSee('for="document"', false);
        $view->assertSee('Upload Document', false);
    }

    public function test_does_not_render_label_when_name_not_provided(): void
    {
        $view = $this->blade('<x-formcomponents::file id="document" />');

        $view->assertDontSee('<label', false);
    }

    public function test_applies_custom_column_class(): void
    {
        $view = $this->blade('<x-formcomponents::file id="document" col="col-6" />');

        $view->assertSee('col-6', false);
        $view->assertSee('mb-3', false);
    }

    public function test_applies_default_column_class(): void
    {
        $view = $this->blade('<x-formcomponents::file id="document" />');

        $view->assertSee('col-12', false);
        $view->assertSee('mb-3', false);
    }

    public function test_shows_error_class_when_validation_fails(): void
    {
        $this->withViewErrors(['document' => 'The file must be a valid document.']);

        $view = $this->blade('<x-formcomponents::file id="document" />');

        $view->assertSee('is-invalid', false);
        $view->assertSee('invalid-feedback', false);
        $view->assertSee('The file must be a valid document.', false);
    }

    public function test_renders_tooltip_when_url_provided(): void
    {
        $view = $this->blade('<x-formcomponents::file id="document" tooltip="https://example.com/help" />');

        $view->assertSee('<a', false);
        $view->assertSee('href="https://example.com/help"', false);
        $view->assertSee('target="_blank"', false);
    }

    public function test_merges_additional_attributes(): void
    {
        $view = $this->blade('<x-formcomponents::file id="document" required multiple />');

        $view->assertSee('required', false);
        $view->assertSee('multiple', false);
    }
}
