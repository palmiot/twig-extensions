<?php

/**
 * Palmiot Twig Extensions - Minify Extension.
 *
 * @copyright Copyright (C) David Palmero.
 * @license MIT
 */

namespace Palmiot\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use MatthiasMullie\Minify as minify;

/**
 * Class type
 *
 * Class for compress CSS and JS from Twig.
 *
 */
class MinifyExtension extends AbstractExtension
{
    /**
	 * This method return the extension name.
	 * @method string getName()
     * @return string Extension name.
	 */
    public function getName()
    {
        return 'palmiot/minify';
    }

    /**
     * Callback for Twig.
     * @ignore
     */
    public function getFunctions()
    {
        return [
            new TwigFunction('minify', [$this, 't_minify'])
        ];
    }

    /**
	 * This method returns minified content.
	 * @method string t_minify()
     * @param string $type Type 'css' or 'js' (lowercase) is allowed.
     * @param string $data Content to minify.
     * @return string Minified data content.
	 */
    public function t_minify($type, $data)
    {
        $packed = '';
        switch($type){
            case 'css':
                $packer = new minify\CSS();
                $packer->add(''.$data.'');
                $packed = $packer->minify();
                unset($packer);
                break;
            case 'js':
                $packer = new minify\JS();
                $packer->add(''.$data.'');
                $packed = $packer->minify();
                unset($packer);
                break;
            default:
                break;
        }
        return $packed;
    }


}
