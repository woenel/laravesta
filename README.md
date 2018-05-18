# Laravesta
VestaCP API for Laravel.

![Packagist](https://img.shields.io/packagist/l/doctrine/orm.svg)

## Installation

Install using Composer
```
$ composer require woenel/laravesta "^0.2"
```

Publish the config file named `laravesta.php` so you can set the hostname, username, password and other configuration.
```
$ php artisan vendor:publish --provider="Woenel\Laravesta\LaravestaServiceProvider"
```

## Usage

#### Create User Account
```
use Laravesta;

$res = Laravesta::execute('v-add-user', [
    'arg1' => 'user01',             // username
    'arg2' => 'p@ssw0rd',           // password
    'arg3' => 'user01@example.com', // email
    'arg4' => 'default',            // package
    'arg5' => 'Ronnel',             // first name
    'arg6' => 'Martinez'            // last name
]);

if($res->getCode() == 0) {
    return "User account has been successfuly created";
}

return "Query returned error code: " . $res->getCode();
```
`getCode()` returns code instead of data.


See [https://vestacp.com/docs/api/#return_codes](https://vestacp.com/docs/api/#return_codes) for returned code meaning.

#### List User Account
```
use Laravesta;

$res = Laravesta::execute('v-list-user', [
    'arg1' => 'user01', // username
    'arg2' => 'json'    // format
]);

return json_decode($res->getData(), true);
```
If the command (like `v-list-user`) is expected to return data aside from code, you can use `getData()` to get it.

For more commands (like `v-add-user` and `v-list-user`), visit VestaCP CLI Documentation at [https://vestacp.com/docs/cli/](https://vestacp.com/docs/cli/).
