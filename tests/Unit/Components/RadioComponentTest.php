<?php

namespace PhilipSorensen\FormComponents\Tests\Unit\Components;

use PhilipSorensen\FormComponents\Tests\TestCase;

class RadioComponentTest extends TestCase
{
    public function test_renders_basic_radio(): void
    {
        $view = $this->blade('<x-formcomponents::radio id="gender" name="Male" value="male" />');

        $view->assertSee('<input', false);
        $view->assertSee('name="gender"', false);
        $view->assertSee('type="radio"', false);
        $view->assertSee('form-check-input', false);
        $view->assertSee('value="male"', false);
    }

    public function test_uses_id_for_both_id_and_name_by_default(): void
    {
        $view = $this->blade('<x-formcomponents::radio id="gender" name="Male" value="male" />');

        $view->assertSee('id="gender"', false);
        $view->assertSee('name="gender"', false);
    }

    public function test_uses_idDistinct_when_provided(): void
    {
        $view = $this->blade('<x-formcomponents::radio id="gender" idDistinct="gender_male" name="Male" value="male" />');

        $view->assertSee('id="gender_male"', false);
        $view->assertSee('name="gender"', false);
    }

    public function test_renders_label(): void
    {
        $view = $this->blade('<x-formcomponents::radio id="gender" name="Male" value="male" />');

        $view->assertSee('<label', false);
        $view->assertSee('Male', false);
    }

    public function test_label_uses_idDistinct_when_provided(): void
    {
        $view = $this->blade('<x-formcomponents::radio id="gender" idDistinct="gender_male" name="Male" value="male" />');

        $view->assertSee('for="gender_male"', false);
    }

    public function test_applies_custom_column_class(): void
    {
        $view = $this->blade('<x-formcomponents::radio id="gender" name="Male" value="male" col="col-6" />');

        $view->assertSee('col-6', false);
        $view->assertSee('mb-3', false);
    }

    public function test_applies_default_column_class(): void
    {
        $view = $this->blade('<x-formcomponents::radio id="gender" name="Male" value="male" />');

        $view->assertSee('col-12', false);
        $view->assertSee('mb-3', false);
    }

    public function test_has_form_check_wrapper(): void
    {
        $view = $this->blade('<x-formcomponents::radio id="gender" name="Male" value="male" />');

        $view->assertSee('form-check', false);
    }

    public function test_shows_error_class_when_validation_fails(): void
    {
        $this->withViewErrors(['gender' => 'Please select a gender.']);

        $view = $this->blade('<x-formcomponents::radio id="gender" name="Male" value="male" />');

        $view->assertSee('is-invalid', false);
        $view->assertSee('invalid-feedback', false);
        $view->assertSee('Please select a gender.', false);
    }

    public function test_renders_required_attribute_when_required(): void
    {
        $view = $this->blade('<x-formcomponents::radio id="gender" name="Male" value="male" :required="true" />');

        $view->assertSee('required', false);
    }

    public function test_does_not_render_required_attribute_by_default(): void
    {
        $html = (string) $this->blade('<x-formcomponents::radio id="gender" name="Male" value="male" />');

        $this->assertStringNotContainsString('required', $html);
    }
}
