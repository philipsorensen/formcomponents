<?php

namespace PhilipSorensen\FormComponents\Tests\Unit\Components;

use PhilipSorensen\FormComponents\Tests\TestCase;

class ImageComponentTest extends TestCase
{
    public function test_renders_basic_image_input(): void
    {
        $view = $this->blade('<x-formcomponents::image id="avatar" />');

        $view->assertSee('<input', false);
        $view->assertSee('id="avatar"', false);
        $view->assertSee('name="avatar"', false);
        $view->assertSee('type="file"', false);
        $view->assertSee('form-control', false);
    }

    public function test_accepts_only_images(): void
    {
        $view = $this->blade('<x-formcomponents::image />');

        $view->assertSee('accept="image/*"', false);
    }

    public function test_has_default_id(): void
    {
        $view = $this->blade('<x-formcomponents::image />');

        $view->assertSee('id="image"', false);
        $view->assertSee('name="image"', false);
    }

    public function test_renders_with_label_when_name_provided(): void
    {
        $view = $this->blade('<x-formcomponents::image id="avatar" name="Profile Picture" />');

        $view->assertSee('<label', false);
        $view->assertSee('for="avatar"', false);
        $view->assertSee('Profile Picture', false);
    }

    public function test_does_not_render_label_when_name_not_provided(): void
    {
        $view = $this->blade('<x-formcomponents::image id="avatar" />');

        $view->assertDontSee('<label', false);
    }

    public function test_applies_custom_column_class(): void
    {
        $view = $this->blade('<x-formcomponents::image id="avatar" col="col-6" />');

        $view->assertSee('col-6', false);
        $view->assertSee('mb-3', false);
    }

    public function test_applies_default_column_class(): void
    {
        $view = $this->blade('<x-formcomponents::image id="avatar" />');

        $view->assertSee('col-12', false);
        $view->assertSee('mb-3', false);
    }

    public function test_shows_error_class_when_validation_fails(): void
    {
        $this->withViewErrors(['avatar' => 'The file must be an image.']);

        $view = $this->blade('<x-formcomponents::image id="avatar" />');

        $view->assertSee('is-invalid', false);
        $view->assertSee('invalid-feedback', false);
        $view->assertSee('The file must be an image.', false);
    }

    public function test_renders_tooltip_when_url_provided(): void
    {
        $view = $this->blade('<x-formcomponents::image id="avatar" tooltip="https://example.com/help" />');

        $view->assertSee('<a', false);
        $view->assertSee('href="https://example.com/help"', false);
        $view->assertSee('target="_blank"', false);
    }

    public function test_merges_additional_attributes(): void
    {
        $view = $this->blade('<x-formcomponents::image id="avatar" required />');

        $view->assertSee('required', false);
    }
}
