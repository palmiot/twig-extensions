<?php

/**
 * Palmiot Twig Extensions - Test of RemoteFile Extension.
 *
 * @copyright Copyright (C) David Palmero.
 * @license __LICENSE__
 */

namespace Palmiot\Twig;

use Palmiot\Twig\RemoteFileExtension;
use PHPUnit\Framework\TestCase;

/**
 * Class type
 *
 * Have some tests for the class RemoteFileExtension.
 *
 */
class RemoteFileExtensionTest extends TestCase
{

    protected function getExtension()
    {
        return new RemoteFileExtension();
    }

    /**
	 * This method check if returns the content of a file and save it.
     * @return void
	 */
    public function testCheckIfCanGetARemoteFileAndSaveIt()
    {
        $newFile = 'temp.html.twig';
        $this->getExtension()->t_remote_file($this->getPathOfFile(), $this->getPathOfTemp(), $newFile);
        $this->assertFileExists($this->getPathOfTemp().$newFile);
        @unlink($this->getPathOfTemp().$newFile);
    }

    /**
	 * This method check if returns the content of a file.
     * @return void
	 */
    public function testCheckIfReturnTheContentOfAFile()
    {
        $this->assertStringContainsString('<h1>{{ \'test\'|raw }}</h1>', $this->getExtension()->t_remote_content($this->getPathOfFile()));
    }

    /**
	 * This method return a path of a single twig template file.
	 * @method string getPathOfFile()
     * @return string Path of file.
	 */
    public static function getPathOfFile(): string
    {
        return __DIR__ . '/fixtures/test.html.twig';
    }

    /**
	 * This method return a temp path for work.
	 * @method string getPathOfTemp()
     * @return string Path of temp folder.
	 */
    public static function getPathOfTemp(): string
    {
        return __DIR__ . '/temp/';
    }


}
