<?php

namespace PhilipSorensen\FormComponents\Tests\Unit\Components;

use PhilipSorensen\FormComponents\Tests\TestCase;

class RangeComponentTest extends TestCase
{
    public function test_renders_basic_range_input(): void
    {
        $view = $this->blade('<x-formcomponents::range id="rating" />');

        $view->assertSee('<input', false);
        $view->assertSee('id="rating"', false);
        $view->assertSee('name="rating"', false);
        $view->assertSee('type="range"', false);
        $view->assertSee('form-range', false);
    }

    public function test_has_default_min_max_step_values(): void
    {
        $view = $this->blade('<x-formcomponents::range id="rating" />');

        $view->assertSee('min="1"', false);
        $view->assertSee('max="5"', false);
        $view->assertSee('step="1"', false);
    }

    public function test_can_override_min_max_step_values(): void
    {
        $view = $this->blade('<x-formcomponents::range id="rating" min="0" max="10" step="0.5" />');

        $view->assertSee('min="0"', false);
        $view->assertSee('max="10"', false);
        $view->assertSee('step="0.5"', false);
    }

    public function test_renders_datalist(): void
    {
        $view = $this->blade('<x-formcomponents::range id="rating" />');

        $view->assertSee('<datalist', false);
        $view->assertSee('list="hello"', false);
        $view->assertSee('<option>1</option>', false);
        $view->assertSee('<option>2</option>', false);
        $view->assertSee('<option>3</option>', false);
        $view->assertSee('<option>4</option>', false);
        $view->assertSee('<option>5</option>', false);
    }

    public function test_datalist_adjusts_to_range(): void
    {
        $view = $this->blade('<x-formcomponents::range id="rating" min="1" max="3" />');

        $view->assertSee('<option>1</option>', false);
        $view->assertSee('<option>2</option>', false);
        $view->assertSee('<option>3</option>', false);
        $view->assertDontSee('<option>4</option>', false);
    }

    public function test_renders_with_label_when_name_provided(): void
    {
        $view = $this->blade('<x-formcomponents::range id="rating" name="Rating" />');

        $view->assertSee('<label', false);
        $view->assertSee('for="rating"', false);
        $view->assertSee('Rating', false);
    }

    public function test_does_not_render_label_when_name_not_provided(): void
    {
        $view = $this->blade('<x-formcomponents::range id="rating" />');

        $view->assertDontSee('<label', false);
    }

    public function test_applies_custom_column_class(): void
    {
        $view = $this->blade('<x-formcomponents::range id="rating" col="col-6" />');

        $view->assertSee('col-6', false);
        $view->assertSee('mb-3', false);
    }

    public function test_applies_default_column_class(): void
    {
        $view = $this->blade('<x-formcomponents::range id="rating" />');

        $view->assertSee('col-12', false);
        $view->assertSee('mb-3', false);
    }

    public function test_shows_error_class_when_validation_fails(): void
    {
        $this->withViewErrors(['rating' => 'Please select a rating.']);

        $view = $this->blade('<x-formcomponents::range id="rating" />');

        $view->assertSee('is-invalid', false);
        $view->assertSee('invalid-feedback', false);
        $view->assertSee('Please select a rating.', false);
    }

    public function test_renders_tooltip_when_url_provided(): void
    {
        $view = $this->blade('<x-formcomponents::range id="rating" tooltip="https://example.com/help" />');

        $view->assertSee('<a', false);
        $view->assertSee('href="https://example.com/help"', false);
        $view->assertSee('target="_blank"', false);
    }

    public function test_preserves_old_input_value(): void
    {
        $this->app['request']->setLaravelSession(
            $this->app['session.store']
        );
        $this->app['session.store']->put('_old_input', ['rating' => '3']);

        $view = $this->blade('<x-formcomponents::range id="rating" />');

        $view->assertSee('value="3"', false);
    }

    public function test_merges_additional_attributes(): void
    {
        $view = $this->blade('<x-formcomponents::range id="rating" required disabled />');

        $view->assertSee('required', false);
        $view->assertSee('disabled', false);
    }
}
