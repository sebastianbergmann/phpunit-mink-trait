<?php
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace phpunit\mink;

use Behat\Mink\Session;
use Behat\Mink\Driver\Goutte\Client as GoutteClient;
use Behat\Mink\Driver\GoutteDriver;
use GuzzleHttp\Client as GuzzleClient;

trait TestCaseTrait
{
    /**
     * @var Session
     */
    private $session;

    /**
     * @before
     */
    protected function createSession()
    {
        $client = new GoutteClient;

        $client->setClient(
            new GuzzleClient(
                [
                    'allow_redirects' => false,
                    'cookies'         => true,
                    'verify'          => false
                ]
            )
        );

        $this->session = new Session(new GoutteDriver($client));
    }

    /**
     * @param string $url
     * @return \Behat\Mink\Element\DocumentElement
     */
    protected function visit($url)
    {
        $this->session->visit($url);

        return $this->session->getPage();
    }
}
