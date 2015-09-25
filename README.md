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

#### Example 1
echo (new \kfosoft\helpers\DisplayAcceptRatio(1366,768))->get(); // 16:9

#### Example 2
$helper = new \kfosoft\helpers\DisplayAcceptRatio(1366,768);
echo $helper->get(); // 16:9
$helper->setWidth(1280);
$helper->setHeight(1024);
echo $helper->get(); // 5:4

Enjoy, guys!
