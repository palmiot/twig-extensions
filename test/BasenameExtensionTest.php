<?php

/**
 * Palmiot Twig Extensions - Test of Basename Extension.
 *
 * @copyright Copyright (C) David Palmero.
 * @license __LICENSE__
 */

namespace Palmiot\Twig;

use Palmiot\Twig\BasenameExtension;
use PHPUnit\Framework\TestCase;

/**
 * Class type
 *
 * Have some tests for the class BasenameExtension.
 *
 */
class BasenameExtensionTest extends TestCase
{
    /**
	 * This method return an instance of Basename Twig Extension.
	 * @method string getExtension()
     * @return BasenameExtension Instance.
	 */
    protected function getExtension()
    {
        return new BasenameExtension();
    }

    /**
	 * This method check if works as expected.
     * @return void
	 */
    public function testCheckIfReturnTrailingNameComponentOfPath()
    {
        $extension = $this->getExtension();
        $this->assertStringContainsString('sudoers', $extension->t_basename('/etc/sudoers.d', '.d'));
        $this->assertStringContainsString('sudoers.d', $extension->t_basename('/etc/sudoers.d'));
        $this->assertStringContainsString('passwd', $extension->t_basename('/etc/passwd'));
        $this->assertStringContainsString('etc', $extension->t_basename('/etc/'));
        $this->assertStringContainsString('.', $extension->t_basename('.'));
        $this->assertStringContainsString('', $extension->t_basename('/'));
    }


}
