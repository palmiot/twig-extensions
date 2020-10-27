<?php

/**
 * Palmiot Twig Extensions - Basename Extension.
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
 * Class for expose PHP basename function to Twig.
 *
 */
class BasenameExtension extends AbstractExtension
{
    /**
	 * This method return the extension name.
	 * @method string getName()
     * @return string Extension name.
	 */
    public function getName()
    {
        return 'palmiot/basename';
    }

    /**
     * Callback for Twig.
     * @ignore
     */
    public function getFunctions()
    {
        return [
            new TwigFunction('basename', [$this, 't_basename'])
        ];
    }

    /**
	 * This method returns trailing name component of path.
	 * @method string t_basename()
     * @param string $path A path.
     * @param string $suffix If the name component ends in suffix this will also be cut off.
     * @return string Trailing name component of path.
	 */
    public function t_basename($path, $suffix = '')
    {
        return basename($path, $suffix);
    }


}
