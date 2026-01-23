<?php

namespace PhilipSorensen\FormComponents\Tests\Unit\Components;

use PhilipSorensen\FormComponents\Tests\TestCase;

class TooltipComponentTest extends TestCase
{
    public function test_renders_basic_tooltip(): void
    {
        $view = $this->blade('<x-formcomponents::tooltip url="https://example.com/help" />');

        $view->assertSee('<a', false);
        $view->assertSee('href="https://example.com/help"', false);
        $view->assertSee('</a>', false);
    }

    public function test_opens_in_new_tab(): void
    {
        $view = $this->blade('<x-formcomponents::tooltip url="https://example.com/help" />');

        $view->assertSee('target="_blank"', false);
    }

    public function test_applies_tooltip_class_from_config(): void
    {
        $view = $this->blade('<x-formcomponents::tooltip url="https://example.com/help" />');

        $view->assertSee('ms-1', false);
    }

    public function test_renders_info_circle_icon(): void
    {
        $view = $this->blade('<x-formcomponents::tooltip url="https://example.com/help" />');

        // The stub component renders an SVG
        $view->assertSee('<svg', false);
        $view->assertSee('bi-info-circle', false);
    }
}
