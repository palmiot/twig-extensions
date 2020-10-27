<?php

/**
 * Palmiot Twig Extensions - Test of Packer Extension.
 *
 * @copyright Copyright (C) David Palmero.
 * @license __LICENSE__
 */

namespace Palmiot\Twig;

use Palmiot\Twig\PackerExtension;
use PHPUnit\Framework\TestCase;

/**
 * Class type
 *
 * Have some tests for the class PackerExtension.
 *
 */
class PackerExtensionTest extends TestCase
{
    /**
	 * This method return an instance of Packer Twig Extension.
	 * @method string getExtension()
     * @return PackerExtension Instance.
	 */
    protected function getExtension()
    {
        return new PackerExtension();
    }

    /**
	 * This method check if return a javascript packed.
     * @return void
	 */
    public function testPackJavascript()
    {
        $this->assertStringContainsString('eval(function(p,a,c,k,e,d)', $this->getExtension()->t_packer('alert(\'checking this\');'));
    }


}
