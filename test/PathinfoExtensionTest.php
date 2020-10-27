<?php

/**
 * Palmiot Twig Extensions - Test of Pathinfo Extension.
 *
 * @copyright Copyright (C) David Palmero.
 * @license __LICENSE__
 */

namespace Palmiot\Twig;

use Palmiot\Twig\PathinfoExtension;
use PHPUnit\Framework\TestCase;

/**
 * Class type
 *
 * Have some tests for the class PathinfoExtension.
 *
 */
class PathinfoExtensionTest extends TestCase
{
    /**
	 * This method return an instance of Pathinfo Twig Extension.
	 * @method string getExtension()
     * @return PathinfoExtension Instance.
	 */
    protected function getExtension()
    {
        return new PathinfoExtension();
    }

    /**
	 * This method check if returns information about a file path
     * @return void
	 */
    public function testCheckIfReturnsInformationAboutAFilePath()
    {
        $path = '/www/htdocs/inc/lib.inc.php';
        $extension = $this->getExtension();
        $this->assertStringContainsString('/www/htdocs/inc', $extension->t_pathinfo($path, 'PATHINFO_DIRNAME'));
        $this->assertStringContainsString('lib.inc.php', $extension->t_pathinfo($path, 'PATHINFO_BASENAME'));
        $this->assertStringContainsString('php', $extension->t_pathinfo($path, 'PATHINFO_EXTENSION'));
        $this->assertStringContainsString('lib.inc', $extension->t_pathinfo($path, 'PATHINFO_FILENAME'));
    }


}
