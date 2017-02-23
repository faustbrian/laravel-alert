# Laravel Alert

I would appreciate you taking the time to look at my [Patreon](https://www.patreon.com/faustbrian) and considering to support me if I'm saving you some time with my work.

## Installation

Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

``` bash
$ composer require faustbrian/laravel-alert
```

And then include the service provider within `app/config/app.php`.

``` php
BrianFaust\Alert\AlertServiceProvider::class
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
    alert()->message('Welcome Aboard!');

    return redirect()->route('dashboard');
}
```

You may also do:

- `alert()->message('Message')`
- `alert()->success('Message')`
- `alert()->info('Message')`
- `alert()->warning('Message')`
- `alert()->error('Message')`
- `alert()->overlay('Modal Message', 'Modal Title')`

Again, this will set one key in the session:

- `alert.messages` - The messages you're alerting, each message is contained as an array
    - `message` - The message you're alerting
    - `level`   - A string that represents the type of notification
    - `title`   - A string that will show up as the modal title
    - `overlay` - A boolean that indicates whether or not the alert is an overlay

Because alert messages and overlays are so common, if you want, you may use (or modify) the views that are included with this package. Simply append to your layout view:

```html
@include('alert::messages')
```

## Example

```html
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Laravel PHP Framework</title>
        <!-- Twitter Bootstrap -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/bootstrap/3.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="//cdn.jsdelivr.net/bootstrap/3.3.1/css/bootstrap-theme.min.css">
        <!-- ZURB Foundation -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/foundation/5.4.7/stylesheets/foundation.min.css">
    </head>

    <body>
        <div class="container">
            @include('alert::messages')
        </div><!-- /.container -->

        <!-- jQuery -->
        <script src="//cdn.jsdelivr.net/jquery/2.1.1/jquery.min.js"></script>
        <!-- Twitter Bootstrap -->
        <script src="//cdn.jsdelivr.net/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        <!-- ZURB Foundation -->
        <script src="//cdn.jsdelivr.net/foundation/5.4.7/javascripts/foundation.min.js"></script>
        <script>
            // Twitter Bootstrap
            $('#alert-overlay-modal').modal();

            // ZURB Foundation
            $('#alert-overlay-modal').foundation('reveal', 'open');
        </script>
    </body>
</html>

```

#### Message (Defaults to Info)
``` php
alert()->message('Welcome aboard!');

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

#### Important

``` php
alert('You successfully read this important alert message.')->important();

return redirect()->route('dashboard');
```

#### Modal / Overlay
``` php
alert()->overlay('One fine body...');

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

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ phpunit
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover a security vulnerability within this package, please send an e-mail to Brian Faust at hello@brianfaust.de. All security vulnerabilities will be promptly addressed.

## Credits

- [Brian Faust](https://github.com/faustbrian)
- [All Contributors](../../contributors)

## License

[MIT](LICENSE) © [Brian Faust](https://brianfaust.de)
