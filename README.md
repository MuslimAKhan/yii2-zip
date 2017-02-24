# yii2-zip

Change php function of using zipArchive to yii2

##1. Need install zip extension of php
```
sudo apt-get install php7.0-zip

```
After installation, you can check with command
```
php --ini
```

##2. All functions related to zip need add "\" in front
```
\ZipArchive
new \RecursiveIteratorIterator

```
