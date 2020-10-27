# twig-extensions

A number of useful filters and functions for Twig.


## Installation

The extensions can be easily installed using [composer](http://getcomposer.org/)

``` bash
composer require palmiot/twig-extensions
```

## Usage

``` php
$twig = new Twig_Environment($loader, $options);
$twig->addExtension(new Palmiot\Twig\Base64Extension());
$twig->addExtension(new Palmiot\Twig\BasenameExtension());
$twig->addExtension(new Palmiot\Twig\MinifyExtension());
$twig->addExtension(new Palmiot\Twig\PackerExtension());
$twig->addExtension(new Palmiot\Twig\PathinfoExtension());
$twig->addExtension(new Palmiot\Twig\RemoteFileExtension());
```

To use in a symfony project [register the extensions as a service](http://symfony.com/doc/current/cookbook/templating/twig_extension.html#register-an-extension-as-a-service).

``` yaml
services:

  twig.extension.base64:
    class: Palmiot\Twig\Base64Extension
    tags:
      - { name: twig.extension }

  twig.extension.basename:
    class: Palmiot\Twig\BasenameExtension
    tags:
      - { name: twig.extension }

  twig.extension.minify:
    class: Palmiot\Twig\MinifyExtension
    tags:
      - { name: twig.extension }

  twig.extension.packer:
    class: Palmiot\Twig\PackerExtension
    tags:
      - { name: twig.extension }

  twig.extension.pathinfo:
    class: Palmiot\Twig\PathinfoExtension
    tags:
      - { name: twig.extension }

  twig.extension.remotefile:
    class: Palmiot\Twig\RemoteFileExtension
    tags:
      - { name: twig.extension }
```


## Base64 extension

Exposes base64 functions to Twig for encodes and decodes data with MIME base64.

```
{{ "palmiot/twig-extensions"|base64_encode }}
{{ "cGFsbWlvdC90d2lnLWV4dGVuc2lvbnM="|base64_decode }}
```


## Basename extension

Exposes [basename](https://www.php.net/basename) to Twig for returns trailing name component of path.

```
{{ basename("/etc/sudoers.d") }}                <!-- sudoers.d -->
{{ basename("/etc/sudoers.d", '.d') }}          <!-- sudoers -->
```


## Minify extension

For compress CSS ( Cascading Style Sheets ) and JS ( JavaScript ) from Twig. ( Using the compress [MatthiasMullie\Minify](https://github.com/matthiasmullie/minify) )

```
{{ minify('css', "-0px") }}                     <!-- 0 -->
{{ minify('js', "object['property']") }}        <!-- object.property -->
```

## Packer extension

For pack JS ( JavaScript ) content from Twig. ( Using the packer [Tholu\Packer\Packer](https://github.com/tholu/php-packer) )

```
{{ packer("alert('checking this');") }}         <!-- eval(function(p,a,c,k,e,d)... -->
```

## Pathinfo extension

Exposes [pathinfo](https://www.php.net/pathinfo) to Twig for get information about a file path.

```
{{ "/www/htdocs/inc/lib.inc.php"|pathinfo('PATHINFO_DIRNAME') }}        <!-- /www/htdocs/inc -->
```
or
```
{% set pathData = "/www/htdocs/inc/lib.inc.php"|pathinfo %}
{{ pathData.dirname }}                                                  <!-- /www/htdocs/inc -->
```

## RemoteFile extension

For get contents of any URL and save as new file if you want.

```
{% set content = remote_content("https://...") %}                                               <!-- content of url inside the variable "content" -->
{% set localFileName = remote_file("https://...", "../templates", "test.html.twig") %}          <!-- the name of the new file saved with the content of the url into the directory `../templates` with name `test.html.twig` -->
```
