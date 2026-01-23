<?php

namespace PhilipSorensen\FormComponents\Tests\Unit\Components;

use PhilipSorensen\FormComponents\Tests\TestCase;

class ButtonComponentTest extends TestCase
{
    public function test_renders_basic_button(): void
    {
        $view = $this->blade('<x-formcomponents::button>Submit</x-formcomponents::button>');

        $view->assertSee('<button', false);
        $view->assertSee('Submit', false);
        $view->assertSee('</button>', false);
    }

    public function test_applies_default_button_class(): void
    {
        $view = $this->blade('<x-formcomponents::button>Submit</x-formcomponents::button>');

        $view->assertSee('btn btn-primary form-control', false);
    }

    public function test_can_override_button_class(): void
    {
        $view = $this->blade('<x-formcomponents::button class="btn btn-danger">Delete</x-formcomponents::button>');

        $view->assertSee('btn btn-danger', false);
    }

    public function test_applies_default_column_class(): void
    {
        $view = $this->blade('<x-formcomponents::button>Submit</x-formcomponents::button>');

        $view->assertSee('col-12', false);
        $view->assertSee('mb-3', false);
    }

    public function test_applies_custom_column_class(): void
    {
        $view = $this->blade('<x-formcomponents::button col="col-6">Submit</x-formcomponents::button>');

        $view->assertSee('col-6', false);
        $view->assertSee('mb-3', false);
    }

    public function test_merges_additional_attributes(): void
    {
        $view = $this->blade('<x-formcomponents::button type="submit" disabled>Submit</x-formcomponents::button>');

        $view->assertSee('type="submit"', false);
        $view->assertSee('disabled', false);
    }

    public function test_renders_slot_content(): void
    {
        $view = $this->blade('<x-formcomponents::button><i class="icon"></i> Save Changes</x-formcomponents::button>');

        $view->assertSee('<i class="icon"></i> Save Changes', false);
    }
}
