<?php

namespace PhilipSorensen\FormComponents\Tests;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;
use Orchestra\Testbench\TestCase as Orchestra;
use PhilipSorensen\FormComponents\Providers\FormComponentsProvider;

abstract class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        // Register a stub for the bootstrapicons component used by tooltip
        Blade::component('bootstrapicons::info-circle', StubInfoCircleComponent::class);

        // Share an empty error bag to prevent undefined variable errors
        $this->app['view']->share('errors', new ViewErrorBag);
    }

    protected function getPackageProviders($app): array
    {
        return [
            FormComponentsProvider::class,
        ];
    }

    protected function defineEnvironment($app): void
    {
        $app['config']->set('formcomponents', [
            'alert' => [
                'danger' => [
                    'class' => 'alert alert-danger',
                ],
                'success' => [
                    'class' => 'alert alert-success',
                ],
            ],
            'button' => [
                'class' => 'btn btn-primary form-control',
            ],
            'div' => [
                'class' => 'col-12',
                'padding' => 'mb-3',
            ],
            'error' => [
                'class' => 'invalid-feedback',
            ],
            'input' => [
                'class' => 'form-control',
            ],
            'is-invalid-class' => 'is-invalid',
            'label' => [
                'class' => 'form-check-label',
            ],
            'textarea' => [
                'class' => 'form-control',
            ],
            'tooltip' => [
                'class' => 'ms-1',
            ],
        ]);
    }
}

/**
 * Stub component for bootstrapicons::info-circle
 */
class StubInfoCircleComponent extends \Illuminate\View\Component
{
    public function render(): string
    {
        return '<svg class="bi bi-info-circle"></svg>';
    }
}
