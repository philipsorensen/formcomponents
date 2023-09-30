View components for forms in Laravel based on Bootstrap 5. 

## Installation

> composer require philipsorensen/formcomponents

Add the following in your `config/app.php` under providers. 

```
PhilipSorensen\FormComponents\Providers\FormComponentsProvider::class
```

## Usage

> <x-formcomponents::input />


Includes button, checkbox, email, hidden, input, number, password, select and text. Each component has label and error statements included. 

The example below works for both create and edit forms. If $item is set, then it shows the edit version. 

> <x-formcomponents::input id="name" name="Navn" :value="old('name', isset($item) ? $item->name : '')" />