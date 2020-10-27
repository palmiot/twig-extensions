<?php

/**
 * Palmiot Twig Extensions - Pathinfo Extension.
 *
 * @copyright Copyright (C) David Palmero.
 * @license MIT
 */

namespace Palmiot\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

/**
 * Class type
 *
 * Class for expose PHP pathinfo function to Twig.
 *
 */
class PathinfoExtension extends AbstractExtension
{
    /**
	 * This method return the extension name.
	 * @method string getName()
     * @return string Extension name.
	 */
    public function getName()
    {
        return 'palmiot/pathinfo';
    }

    /**
     * Callback for Twig.
     * @ignore
     */
    public function getFilters()
    {
        return [
            new TwigFilter('pathinfo', [$this, 't_pathinfo'])
        ];
    }

    /**
	 * This method returns information about a file path.
	 * @method string t_pathinfo()
     * @param string $path The path to be parsed.
     * @param string $options Specifies a specific element to be returned; one of PATHINFO_DIRNAME, PATHINFO_BASENAME, PATHINFO_EXTENSION or PATHINFO_FILENAME.
     * @return string Information about a file path.
	 */
    public function t_pathinfo($path, $options = '')
    {
        return (empty($options)) ? pathinfo($path) : pathinfo($path, constant($options));
    }


}
