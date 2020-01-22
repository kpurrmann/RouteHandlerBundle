Installation
============

Make sure Composer is installed globally, as explained in the
[installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

Applications that use Symfony Flex
==================================

Open a command console, enter your project directory and execute:

```console
$ composer require purrmannwebsolutions/route-note-bundle
```

Applications that don't use Symfony Flex
----------------------------------------

### Step 1: Download the Bundle

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```console
$ composer require purrmannwebsolutions/link-handler-bundle
```

### Step 2: Enable the Bundle

Then, enable the bundle by adding it to the list of registered bundles
in the `config/bundles.php` file of your project:

```php
// config/bundles.php

return [
    // ...
    PurrmannWebsolutions\LinkHandlerBundle\PurrmannWebsolutionsLinkHandlerBundle::class => ['all' => true],
];

```
Enable routing

```yaml
// config/routes/route_note.yaml

purrmannwebsolutions_route_note:
  resource: '@PurrmannWebsolutionsRouteNoteBundle/Resources/config/routing.yml'


```

Update database

```console
$ php bin/console make:migration
$ php bin/console doctrine:migrations:migrate
```

Integrate CSS

``` css
@import "../../public/bundles/purrmannwebsolutionsroutenote/css/toolbar.css";
```
