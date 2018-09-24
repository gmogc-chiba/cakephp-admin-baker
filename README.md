# AdminBaker plugin for CakePHP

## Installation

You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).

The recommended way to install composer packages is:

```
composer require tsyama/cakephp-admin-baker --dev
```

## Usage
### 1. Add to config/bootstrap.php

```php
Plugin::load('AdminBaker', ['bootstrap' => false, 'routes' => true]);
```

### 2. Execute bake command

```
bin/cake bake admin_baker Test --theme AdminBaker
```

### 3. Add controller extends AdminBakerController

```php
use App\Controller\AdminBakerController;

class TestController extends AdminBakerController
{
    ...
}
```