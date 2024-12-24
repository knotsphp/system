# System
[![Latest Stable Version](https://poser.pugx.org/knotsphp/system/v)](https://packagist.org/packages/knotsphp/system) 
[![Total Downloads](https://poser.pugx.org/knotsphp/system/downloads)](https://packagist.org/packages/knotsphp/system) 
[![Latest Unstable Version](https://poser.pugx.org/knotsphp/system/v/unstable)](https://packagist.org/packages/knotsphp/system) 
[![License](https://poser.pugx.org/knotsphp/system/license)](https://packagist.org/packages/knotsphp/system) 
[![PHP Version Require](https://poser.pugx.org/knotsphp/system/require/php)](https://packagist.org/packages/knotsphp/system) 
[![GitHub Workflow Status (with event)](https://img.shields.io/github/actions/workflow/status/knotsphp/system/test.yml?label=Tests)](https://github.com/knotsphp/system/actions/workflows/test.yml)

A modern PHP library to get system information with Enums and Value Objects.

The goal is to have reliable and consistent system information across different operating systems.

This library use local commands to get the system information and parse the output to provide a consistent API.

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
WIP
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
vendor/bin/sysinfo

# Globally installed
sysinfo
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
