<?php

/**
 * Palmiot Twig Extensions - Test of Base64 Extension.
 *
 * @copyright Copyright (C) David Palmero.
 * @license __LICENSE__
 */

namespace Palmiot\Twig;

use Palmiot\Twig\Base64Extension;
use PHPUnit\Framework\TestCase;

/**
 * Class type
 *
 * Have some tests for the class Base64Extension.
 *
 */
class Base64ExtensionTest extends TestCase
{
    /**
	 * This method return an instance of Base64 Twig Extension.
	 * @method string getExtension()
     * @return Base64Extension Instance.
	 */
    protected function getExtension()
    {
        return new Base64Extension();
    }

    /**
	 * This method check if works the encode as expected.
     * @return void
	 */
    public function testEncodeString()
    {
        $this->assertStringContainsString('cGFsbWlvdC90d2lnLWV4dGVuc2lvbnM=', $this->getExtension()->t_base64Encode('palmiot/twig-extensions'));
    }

    /**
	 * This method check if works the decode as expected.
     * @return void
	 */
    public function testDecodeString()
    {
        $this->assertStringContainsString('palmiot/twig-extensions', $this->getExtension()->t_base64Decode('cGFsbWlvdC90d2lnLWV4dGVuc2lvbnM='));
    }


}
