<?php

/**
 * Palmiot Twig Extensions - Packer Extension.
 *
 * @copyright Copyright (C) David Palmero.
 * @license MIT
 */

namespace Palmiot\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use Tholu\Packer\Packer as packer;

/**
 * Class type
 *
 * Class for pack JS content from Twig.
 *
 */
class PackerExtension extends AbstractExtension
{
    /**
	 * This method return the extension name.
	 * @method string getName()
     * @return string Extension name.
	 */
    public function getName()
    {
        return 'palmiot/packer';
    }

    /**
     * Callback for Twig.
     * @ignore
     */
    public function getFunctions()
    {
        return [
            new TwigFunction('packer', [$this, 't_packer'])
        ];
    }

    /**
	 * This method returns packed content.
	 * @method string t_packer()
     * @param string $data JavaScript content to pack.
     * @return string Packed data content.
	 */
    public function t_packer($data)
    {
        $packer = new packer($data, 'Normal', true, false, true);
        $packed = $packer->pack();
        return $packed;
    }


}
