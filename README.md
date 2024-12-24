# System
[![Latest Stable Version](https://poser.pugx.org/knotsphp/system/v)](https://packagist.org/packages/knotsphp/system) 
[![Total Downloads](https://poser.pugx.org/knotsphp/system/downloads)](https://packagist.org/packages/knotsphp/system) 
[![Latest Unstable Version](https://poser.pugx.org/knotsphp/system/v/unstable)](https://packagist.org/packages/knotsphp/system) 
[![License](https://poser.pugx.org/knotsphp/system/license)](https://packagist.org/packages/knotsphp/system) 
[![PHP Version Require](https://poser.pugx.org/knotsphp/system/require/php)](https://packagist.org/packages/knotsphp/system) 
[![GitHub Workflow Status (with event)](https://img.shields.io/github/actions/workflow/status/knotsphp/system/test.yml?label=Tests)](https://github.com/knotsphp/system/actions/workflows/test.yml)

A modern PHP library to get system information with Enums and Value Objects.

The goal is to get reliable and consistent system information across different operating systems.

This library use local commands to get the system information and parse the output to ensure consistency.

It also provides a command line utility: `sysinfo`.

Compatible with MacOS, Linux, and Windows.

This library is still very young and contributions are welcome.

## 🚀 Installation

```bash
composer require knotsphp/system
```

## 📚 Usage

```php
use KnotsPHP\System\System;
use KnotsPHP\System\Enums\OperatingSystem;

// Get the operating system
$os_enum = OperatingSystem::current(); // Returns an enum
$os = System::os(); // Returns an instance of OperatingSystemContract
````

The `OperatingSystemContract` provides the following methods through the `Windows`, `Linux`, and `MacOS` classes.
```php
// Get basic system information
echo $os->name();           // MacOS    Ubuntu            Windows
echo $os->version();        // 15.2     20.04             10
echo $os->kernel();         // 24.2.0   5.4.0-42-generic  10.0.18363.1316
echo $os->build();          // 24C101   5.4.0-42-generic  21H2
```

## 📚 Use in command line

You can also use this library in the command line by using the `system` command.

It's recommended to install the library globally to use it in the command line.
```bash
composer global require knotsphp/system
```

Then you can use the `sysinfo` command.
```bash
# In your project directory
vendor/bin/sysinfo

# Globally installed
sysinfo
```

## 📖 Documentation
This library is compatible with MacOS, Linux, and Windows.

Contributions are welcome to add more operating systems.


## 📋 TODO
- [ ] Make the Shell class usable through a pipeline to run commands through SSH
- [ ] Add an DataValueObject so the developer can feed raw data and pass it to other libraries
- [ ] Make a Machine class to get more information about the machine
- [ ] Make a Monitor class to get current system usage
- [ ] Make a Network class to get network information

Suggestions are welcome, but please follow these guidelines:
- Do not add anything that requires elevated access
- Do not add anything that requires writing to the system
- Do not add anything that requires installation of additional software

## 🤝 Contributing
Clone the project and run `composer update` to install the dependencies.

Before pushing your changes, run `composer qa`. 

This will run [pint](http://github.com/laravel/pint) (code style), [phpstan](http://github.com/phpstan/phpstan) (static analysis), and [pest](http://github.com/pestphp/pest) (tests).

## 👥 Credits

System was created by Eser DENIZ.

## 📝 License

System is licensed under the MIT License. See LICENSE for more information.
