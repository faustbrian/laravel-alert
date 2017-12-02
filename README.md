# Laravel Alert

## Installation

Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

``` bash
$ composer require faustbrian/laravel-alert
```

If you need to modify the configuration or the views, you can run:

```bash
php artisan vendor:publish --provider="BrianFaust\Alert\AlertServiceProvider"
```

The package views will now be located in the `app/resources/views/vendor/alert/` directory and the configuration will be located at `app/config/alert.php`.

## Usage

Within your controllers, before you perform a redirect...

``` php
public function store(Alert $alert)
{
    alert()->info('Welcome Aboard!');

    return redirect()->route('dashboard');
}
```

You may also do:

- `alert()->flash('Message')`
- `alert()->success('Message')`
- `alert()->info('Message')`
- `alert()->warning('Message')`
- `alert()->error('Message')`

Again, this will set one key in the session:

- `alert.messages` - The messages you're alerting, each message is contained as an array
    - `message` - The message you're alerting
    - `level`   - A string that represents the type of notification
    - `title`   - A string that will show up as the modal title

Because alert messages and overlays are so common, if you want, you may use (or modify) the views that are included with this package. Simply append to your layout view:

```html
@include('laravel-alert::messages')
```

#### Message (Defaults to Info)
``` php
alert()->flash('Welcome aboard!');

return redirect()->route('dashboard');
```

#### Success
``` php
alert()->success('You successfully read this important alert message.');

return redirect()->route('dashboard');
```

#### Info

``` php
alert()->info('This alert needs your attention, but it\'s not super important.');

return redirect()->route('dashboard');
```

#### Warning
``` php
alert()->warning('Better check yourself, you\'re not looking too good.');

return redirect()->route('dashboard');
```

#### Error

``` php
alert()->error('Change a few things up and try submitting again.');

return redirect()->route('dashboard');
```

#### Laravel Validation
``` php
$validator = Validator::make(
    ['name' => 'Invalid'],
    ['name' => 'required|min:8']
);

alert()->error($validator->messages());

return redirect()->route('dashboard');
```

#### Chain Messages

``` php
alert()->success('You successfully read this important alert message.')
       ->info('This alert needs your attention, but it\'s not super important.')
       ->warning('Better check yourself, you\'re not looking too good.')
       ->error('Change a few things up and try submitting again.')
       ->overlay('One fine body...');

return redirect()->route('dashboard');
```

## Testing

``` bash
$ phpunit
```

## Security

If you discover a security vulnerability within this package, please send an e-mail to Brian Faust at hello@brianfaust.me. All security vulnerabilities will be promptly addressed.

## Credits

- [Brian Faust](https://github.com/faustbrian)
- [All Contributors](../../contributors)

## License

[MIT](LICENSE) © [Brian Faust](https://brianfaust.me)
