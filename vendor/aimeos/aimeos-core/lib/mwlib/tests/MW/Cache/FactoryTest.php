<?php

namespace Aimeos\MW\Cache;


/**
 * Test class for \Aimeos\MW\Cache\Factory.
 *
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2014
 * @copyright Aimeos (aimeos.org), 2015-2018
 */
class FactoryTest extends \PHPUnit\Framework\TestCase
{
	public function testFactory()
	{
		$config = array(
			'sql' => array(
				'delete' => '', 'deletebytag' => '',
				'get' => '', 'getbytag' => '',
				'set' => '', 'settag' => ''
			),
			'search' => array(
				'cache.id' => '', 'cache.siteid' => '', 'cache.value' => '',
				'cache.expire' => '', 'cache.tag.name' => ''
			),
		);

		$object = \Aimeos\MW\Cache\Factory::createManager( 'DB', $config, \TestHelperMw::getDBManager() );
		$this->assertInstanceOf( '\\Aimeos\\MW\\Cache\\Iface', $object );
	}


	public function testFactoryUnknown()
	{
		$this->setExpectedException( '\\Aimeos\\MW\\Cache\\Exception' );
		\Aimeos\MW\Cache\Factory::createManager( 'unknown', [], null );
	}


	public function testFactoryInvalidCharacters()
	{
		$this->setExpectedException( '\\Aimeos\\MW\\Cache\\Exception' );
		\Aimeos\MW\Cache\Factory::createManager( '$$$', [], null );
	}


	public function testFactoryInvalidClass()
	{
		$this->setExpectedException( '\\Aimeos\\MW\\Cache\\Exception' );
		\Aimeos\MW\Cache\Factory::createManager( 'InvalidCache', [], null );
	}
}


class InvalidCache
{
}
