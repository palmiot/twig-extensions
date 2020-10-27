<?php

/**
 * Palmiot Twig Extensions - Base64 Extension.
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
 * Class for expose PHP's base64 functions to Twig.
 *
 */
class Base64Extension extends AbstractExtension
{
    /**
	 * This method return the extension name.
	 * @method string getName()
     * @return string Extension name.
	 */
    public function getName()
    {
        return 'palmiot/base64';
    }

    /**
     * Callback for Twig.
     * @ignore
     */
    public function getFilters()
    {
        return [
            new TwigFilter('base64_encode', [$this, 't_base64Encode']),
            new TwigFilter('base64_decode', [$this, 't_base64Decode'])
        ];
    }

    /**
	 * This method return the encoded string.
	 * @method string t_base64Encode()
     * @param string $data Content to encode.
     * @return string Encoded string.
	 */
    public function t_base64Encode($data)
    {
        return base64_encode($data);
    }

    /**
	 * This method return the decoded string.
	 * @method string t_base64Decode()
     * @param string $data Content to decode.
     * @return string Decoded string.
	 */
    public function t_base64Decode($data)
    {
        return base64_decode($data);
    }


}
