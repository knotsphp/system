# System

[//]: # ([![Latest Stable Version]&#40;https://poser.pugx.org/knotsphp/system/v&#41;]&#40;https://packagist.org/packages/knotsphp/system&#41; )

[//]: # ([![Total Downloads]&#40;https://poser.pugx.org/knotsphp/system/downloads&#41;]&#40;https://packagist.org/packages/knotsphp/system&#41; )

[//]: # ([![Latest Unstable Version]&#40;https://poser.pugx.org/knotsphp/system/v/unstable&#41;]&#40;https://packagist.org/packages/knotsphp/system&#41; )

[//]: # ([![License]&#40;https://poser.pugx.org/knotsphp/system/license&#41;]&#40;https://packagist.org/packages/knotsphp/system&#41; )

[//]: # ([![PHP Version Require]&#40;https://poser.pugx.org/knotsphp/system/require/php&#41;]&#40;https://packagist.org/packages/knotsphp/system&#41; )

[//]: # ([![GitHub Workflow Status &#40;with event&#41;]&#40;https://img.shields.io/github/actions/workflow/status/knotsphp/system/test.yml?label=Tests&#41;]&#40;https://github.com/knotsphp/system/actions/workflows/test.yml&#41;)

A modern PHP library to get system information with Enums and Value Objects.

It also provides a command line utility: `sysinfo`.

Compatible with MacOS, Linux, and Windows.

> ⚠️ **Warning:** Library in active development.
> Follow me on [Twitter](https://twitter.com/srwiez) or [BlueSky](https://bsky.app/profile/srwiez.com) for updates.
> You can also put a star and watch the repo in the meantime.


## 🚀 Installation

```bash
composer require knotsphp/system
```

## 📚 Usage

```php
use KnotsPHP\System\System;

// Flush DNS cache
$success = System::run(); 

// Only get the command
$command = System::getCommand();

// Check if the command needs elevated privileges
$needsElevation = System::needsElevation();
```

## 📚 Use in command line

You can also use this library in the command line by using the `system` command.

It's recommended to install the library globally to use it in the command line.
```bash
composer global require knotsphp/system
```

Then you can use the `system` command to get the public IP address of the current machine.
```bash
# In your project directory
vendor/bin/system

# Globally installed
system
```

## 📖 Documentation
This library is compatible with MacOS, Linux, and Windows.

Some operating systems may require root access to flush the DNS cache.

## 🤝 Contributing
Clone the project and run `composer update` to install the dependencies.

Before pushing your changes, run `composer qa`. 

This will run [pint](http://github.com/laravel/pint) (code style), [phpstan](http://github.com/phpstan/phpstan) (static analysis), and [pest](http://github.com/pestphp/pest) (tests).

## 👥 Credits

System was created by Eser DENIZ.

## 📝 License

System is licensed under the MIT License. See LICENSE for more information.
