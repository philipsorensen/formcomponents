<?php

namespace PhilipSorensen\FormComponents\Tests\Unit\Components;

use PhilipSorensen\FormComponents\Tests\TestCase;

class HiddenComponentTest extends TestCase
{
    public function test_renders_basic_hidden_input(): void
    {
        $view = $this->blade('<x-formcomponents::hidden id="token" name="token" />');

        $view->assertSee('<input', false);
        $view->assertSee('id="token"', false);
        $view->assertSee('name="token"', false);
        $view->assertSee('type="hidden"', false);
    }

    public function test_does_not_render_wrapper_div(): void
    {
        $view = $this->blade('<x-formcomponents::hidden id="token" name="token" />');

        $view->assertDontSee('<div', false);
        $view->assertDontSee('col-12', false);
        $view->assertDontSee('mb-3', false);
    }

    public function test_does_not_render_label(): void
    {
        $view = $this->blade('<x-formcomponents::hidden id="token" name="Token" />');

        $view->assertDontSee('<label', false);
    }

    public function test_accepts_value_attribute(): void
    {
        $view = $this->blade('<x-formcomponents::hidden id="token" name="token" value="secret123" />');

        $view->assertSee('value="secret123"', false);
    }

    public function test_preserves_old_input_value(): void
    {
        $this->app['request']->setLaravelSession(
            $this->app['session.store']
        );
        $this->app['session.store']->put('_old_input', ['token' => 'old_token_value']);

        $view = $this->blade('<x-formcomponents::hidden id="token" name="token" />');

        $view->assertSee('value="old_token_value"', false);
    }

    public function test_merges_additional_attributes(): void
    {
        $view = $this->blade('<x-formcomponents::hidden id="token" name="token" data-custom="value" />');

        $view->assertSee('data-custom="value"', false);
    }
}
