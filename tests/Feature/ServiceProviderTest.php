<?php

namespace PhilipSorensen\FormComponents\Tests\Feature;

use PhilipSorensen\FormComponents\Tests\TestCase;

class ServiceProviderTest extends TestCase
{
    public function test_config_is_merged(): void
    {
        $config = config('formcomponents');

        $this->assertIsArray($config);
        $this->assertArrayHasKey('button', $config);
        $this->assertArrayHasKey('div', $config);
        $this->assertArrayHasKey('input', $config);
        $this->assertArrayHasKey('label', $config);
        $this->assertArrayHasKey('error', $config);
        $this->assertArrayHasKey('tooltip', $config);
        $this->assertArrayHasKey('alert', $config);
        $this->assertArrayHasKey('textarea', $config);
        $this->assertArrayHasKey('is-invalid-class', $config);
    }

    public function test_views_are_registered_with_namespace(): void
    {
        $viewFactory = $this->app['view'];
        $hints = $viewFactory->getFinder()->getHints();

        $this->assertArrayHasKey('formcomponents', $hints);
    }

    public function test_config_values_are_correct(): void
    {
        $this->assertEquals('col-12', config('formcomponents.div.class'));
        $this->assertEquals('mb-3', config('formcomponents.div.padding'));
        $this->assertEquals('form-control', config('formcomponents.input.class'));
        $this->assertEquals('is-invalid', config('formcomponents.is-invalid-class'));
        $this->assertEquals('invalid-feedback', config('formcomponents.error.class'));
        $this->assertEquals('form-check-label', config('formcomponents.label.class'));
        $this->assertEquals('btn btn-primary form-control', config('formcomponents.button.class'));
        $this->assertEquals('ms-1', config('formcomponents.tooltip.class'));
    }

    public function test_alert_config_values_are_correct(): void
    {
        $this->assertEquals('alert alert-danger', config('formcomponents.alert.danger.class'));
        $this->assertEquals('alert alert-success', config('formcomponents.alert.success.class'));
    }
}
