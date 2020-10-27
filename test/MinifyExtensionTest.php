<?php

/**
 * Palmiot Twig Extensions - Test of Minify Extension.
 *
 * @copyright Copyright (C) David Palmero.
 * @license __LICENSE__
 */

namespace Palmiot\Twig;

use Palmiot\Twig\MinifyExtension;
use PHPUnit\Framework\TestCase;

/**
 * Class type
 *
 * Have some tests for the class MinifyExtension.
 *
 */
class MinifyExtensionTest extends TestCase
{
    /**
	 * This method return an instance of Minify Twig Extension.
	 * @method string getExtension()
     * @return MinifyExtension Instance.
	 */
    protected function getExtension()
    {
        return new MinifyExtension();
    }

    /**
	 * This method check if return javascript compressed.
     * @return void
	 */
    public function testCompressJavascript()
    {
        $extension = $this->getExtension();
        $this->assertStringContainsString('!0', $extension->t_minify('js', 'true'));
        $this->assertStringContainsString('!1', $extension->t_minify('js', 'false'));
        $this->assertStringContainsString('object.property', $extension->t_minify('js', 'object[\'property\']'));
    }

    /**
	 * This method check if return stylesheet compressed.
     * @return void
	 */
    public function testCompressStylesheet()
    {
        $extension = $this->getExtension();
        $this->assertStringContainsString('body{color:red}', $extension->t_minify('css', 'body {
            /* without this */
            color: red;
        }', 'css'));
        $this->assertStringContainsString('0', $extension->t_minify('css', '-0px'));
    }


}
