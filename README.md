# Laravel Boilerplate - Laravel 7.x API

## List of features/packages:
- Psalm for static analysis
- JWT Auth
- [Spatie DTO package](https://github.com/spatie/data-transfer-object)
- [Spatie Query Builder package](https://github.com/spatie/laravel-query-builder)

## Laravel customizations
- `BaseApplication` - changed base directory and namespace of Laravel application
- Separate applications (consumers), and Domain (business logic)
- `RouteServiceProvider` - removed controllers base namespace

## Exposed services in Production/Staging environment

- Nginx at ports 80/443
- MariaDB at port 3306
- Portainer at port 9000

