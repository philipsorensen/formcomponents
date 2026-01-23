<?php

namespace PhilipSorensen\FormComponents\Tests\Unit\Components;

use PhilipSorensen\FormComponents\Tests\TestCase;

class LabelComponentTest extends TestCase
{
    public function test_renders_basic_label(): void
    {
        $view = $this->blade('<x-formcomponents::label id="email" name="Email Address" />');

        $view->assertSee('<label', false);
        $view->assertSee('for="email"', false);
        $view->assertSee('Email Address', false);
        $view->assertSee('</label>', false);
    }

    public function test_applies_default_class(): void
    {
        $view = $this->blade('<x-formcomponents::label id="email" name="Email" />');

        $view->assertSee('form-check-label', false);
    }

    public function test_can_override_class(): void
    {
        $view = $this->blade('<x-formcomponents::label id="email" name="Email" class="custom-label" />');

        $view->assertSee('custom-label', false);
    }

    public function test_renders_html_in_name(): void
    {
        $view = $this->blade('<x-formcomponents::label id="email" name="<strong>Required</strong> Email" />');

        $view->assertSee('<strong>Required</strong> Email', false);
    }

    public function test_merges_additional_attributes(): void
    {
        $view = $this->blade('<x-formcomponents::label id="email" name="Email" data-test="value" />');

        $view->assertSee('data-test="value"', false);
    }
}
