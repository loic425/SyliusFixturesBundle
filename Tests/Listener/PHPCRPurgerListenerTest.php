<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sylius\Bundle\FixturesBundle\Tests\Listener;

use Doctrine\Common\Persistence\ManagerRegistry;
use Matthias\SymfonyConfigTest\PhpUnit\ConfigurationTestCaseTrait;
use Sylius\Bundle\FixturesBundle\Listener\PHPCRPurgerListener;

/**
 * @author Kamil Kokot <kamil.kokot@lakion.com>
 */
final class PHPCRPurgerListenerTest extends \PHPUnit_Framework_TestCase
{
    use ConfigurationTestCaseTrait;

    /**
     * @test
     */
    function its_manager_is_the_default_one()
    {
        $this->assertProcessedConfigurationEquals([[]], ['managers' => [null]], 'managers');
    }

    /**
     * @test
     */
    function its_default_manager_can_be_replaced_with_custom_ones()
    {
        $this->assertProcessedConfigurationEquals([['managers' => ['custom']]], ['managers' => ['custom']], 'managers');
    }

    /**
     * {@inheritdoc}
     */
    protected function getConfiguration()
    {
        return new PHPCRPurgerListener($this->getMockBuilder(ManagerRegistry::class)->getMock());
    }
}