<?php

/**
 * Palmiot Twig Extensions - RemoteFile Extension.
 *
 * @copyright Copyright (C) David Palmero.
 * @license MIT
 */

namespace Palmiot\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * Class type
 *
 * Class for get contents of any URL from Twig.
 *
 */
class RemoteFileExtension extends AbstractExtension
{
    /**
	 * This method return the extension name.
	 * @method string getName()
     * @return string Extension name.
	 */
    public function getName()
    {
        return 'palmiot/remotefile';
    }

    /**
     * Callback for Twig.
     * @ignore
     */
    public function getFunctions()
    {
        return [
            new TwigFunction('remote_file', [$this, 't_remote_file']),
            new TwigFunction('remote_content', [$this, 't_remote_content'])
        ];
    }

    /**
	 * This method get content of a URL and save it locally for returns finally the name of file.
	 * @method string t_remote_file()
     * @param string $url For get or extract the content.
     * @param string $path The path where save the content.
     * @param string $name Specifies the name of local file.
     * @return string The name of local file saved.
	 */
    public function t_remote_file($url, $path = '', $name = '')
    {
        $path = (substr($path, -1) == DIRECTORY_SEPARATOR) ? $path : $path.DIRECTORY_SEPARATOR;
        $name = (empty($name)) ? sha1($name).'.'.pathinfo($url, PATHINFO_EXTENSION) : $name;
        if(!is_file($path.$name))
        {
            file_put_contents($path.$name, $this->t_remote_content($url));
        }
        return $name;
    }

    /**
	 * This method get content of a URL and return it.
	 * @method string t_remote_content()
     * @param string $url For get or extract the content.
     * @return string The content of the URL.
	 */
    public function t_remote_content($url)
    {
        return file_get_contents($url);
    }


}
