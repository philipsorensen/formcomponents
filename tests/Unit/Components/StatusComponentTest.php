<?php

namespace PhilipSorensen\FormComponents\Tests\Unit\Components;

use PhilipSorensen\FormComponents\Tests\TestCase;

class StatusComponentTest extends TestCase
{
    public function test_does_not_render_when_no_session_messages(): void
    {
        $view = $this->blade('<x-formcomponents::status />');

        $view->assertDontSee('<div', false);
        $view->assertDontSee('alert', false);
    }

    public function test_renders_error_alert_when_error_session_exists(): void
    {
        session(['error' => 'Something went wrong!']);

        $view = $this->blade('<x-formcomponents::status />');

        $view->assertSee('<div', false);
        $view->assertSee('alert alert-danger', false);
        $view->assertSee('role="alert"', false);
        $view->assertSee('Something went wrong!', false);
    }

    public function test_renders_success_alert_when_success_session_exists(): void
    {
        session(['success' => 'Operation completed successfully!']);

        $view = $this->blade('<x-formcomponents::status />');

        $view->assertSee('<div', false);
        $view->assertSee('alert alert-success', false);
        $view->assertSee('role="alert"', false);
        $view->assertSee('Operation completed successfully!', false);
    }

    public function test_renders_both_alerts_when_both_sessions_exist(): void
    {
        session([
            'error' => 'An error occurred!',
            'success' => 'But something succeeded too!',
        ]);

        $view = $this->blade('<x-formcomponents::status />');

        $view->assertSee('alert alert-danger', false);
        $view->assertSee('An error occurred!', false);
        $view->assertSee('alert alert-success', false);
        $view->assertSee('But something succeeded too!', false);
    }

    public function test_applies_alert_classes_from_config(): void
    {
        session(['error' => 'Error']);

        $view = $this->blade('<x-formcomponents::status />');

        $view->assertSee('alert alert-danger', false);
    }
}
