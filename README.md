Yii2 IPStack Client
===================
Locate and identify website visitors by IP address using IPStack API

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist daxslab/yii2-ipstack "*"
```

or add

```
"daxslab/yii2-ipstack": "*"
```

to the require section of your `composer.json` file.


Configuration
-------------

Add the component to the application:

```php
'components' => [
    'ipStack' => [
        'class' => \daxslab\ipstack\Client::class,
        'api_key' => '{YOUR_API_KEY}',
    ],
]
```

Usage
-----

Request info about current user IP

```php
Yii::$app->ipStack->getData();
```

Request info about a custom IP

```php
Yii::$app->ipStack->getData($ip);
```
