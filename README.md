# Introduction

Playground is a bundle of commands to create, list, remove plugins and use the laravel commands for each plugin.

### Installation

To get started with playground run:

     composer require plugide/playground --dev

### Basic Usage

Create a new plugin

```
php artisan make:plugin <name>    
php artisan make:plugin <type>:<name>    
php artisan make:plugin <name> --type=module --stub=custom
```

List all plugins

```
php artisan list:plugin
```


Delete a plugin

```
php artisan delete:plugin <name>   
php artisan delete:plugin <type>:<name>
php artisan delete:plugin <name> --type=module 
```

### Laravel commands

For the arguments and options of each command check the laravel documentation.

The commands have the following base structure.

```
php artisan plug:<action> --plug=module:blog  
```

Example:

```
php artisan plug:model Category -mf --plug=module:blog
```

Database: Seeding -> Special case.

```
php artisan seed:plugin
php artisan seed:plugin <type>:<name>
```



## License

Plug IDE is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
