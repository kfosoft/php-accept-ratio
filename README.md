# PHP Screen Accept Ratio Helper
## Installation

Installation with Composer

Either run
~~~
    php composer.phar require --prefer-dist kfosoft/php-accept-ratio:"*"
~~~
or add in composer.json
~~~
    "require": {
            ...
            "kfosoft/php-accept-ratio":"*"
    }
~~~

Well done!

#### Examples
```
use KFOSOFT\Domain\Display\Value\DisplayAcceptRatio;

echo DisplayAcceptRatio::create(1366, 768)(); // 16:9
echo DisplayAcceptRatio::create(1280, 1024)->calculateRatio(); // 5:4
```

Enjoy, guys!
