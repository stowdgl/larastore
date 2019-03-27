<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2011
 * @copyright Aimeos (aimeos.org), 2015-2018
 * @package MShop
 * @subpackage Service
 */


namespace Aimeos\MShop\Service\Item;


/**
 * Service item with common methods.
 *
 * @package MShop
 * @subpackage Service
 */
class Standard
	extends \Aimeos\MShop\Common\Item\Base
	implements \Aimeos\MShop\Service\Item\Iface
{
	use \Aimeos\MShop\Common\Item\ListRef\Traits;


	private $values;


	/**
	 * Initializes the item object.
	 *
	 * @param array $values Parameter for initializing the basic properties
	 * @param \Aimeos\MShop\Common\Lists\Item\Iface[] $listItems List of list items
	 * @param \Aimeos\MShop\Common\Item\Iface[] $refItems List of referenced items
	 */
	public function __construct( array $values = [], array $listItems = [], array $refItems = [] )
	{
		parent::__construct( 'service.', $values );

		$this->initListItems( $listItems, $refItems );
		$this->values = $values;
	}


	/**
	 * Returns the code of the service item payment if available.
	 *
	 * @return string Service item code
	 */
	public function getCode()
	{
		if( isset( $this->values['service.code'] ) ) {
			return (string) $this->values['service.code'];
		}

		return '';
	}


	/**
	 * Sets the code of the service item payment.
	 *
	 * @param string code of the service item payment
	 * @return \Aimeos\MShop\Service\Item\Iface Service item for chaining method calls
	 */
	public function setCode( $code )
	{
		if( (string) $code !== $this->getCode() )
		{
			$this->values['service.code'] = (string) $this->checkCode( $code );
			$this->setModified();
		}

		return $this;
	}


	/**
	 * Returns the type of the service item if available.
	 *
	 * @return string|null Service item type
	 */
	public function getType()
	{
		if( isset( $this->values['service.type'] ) ) {
			return (string) $this->values['service.type'];
		}
	}


	/**
	 * Returns the localized name of the type
	 *
	 * @return string|null Localized name of the type
	 */
	public function getTypeName()
	{
		if( isset( $this->values['service.typename'] ) ) {
			return (string) $this->values['service.typename'];
		}
	}


	/**
	 * Returns the type ID of the service item if available.
	 *
	 * @return string|null Service item type ID
	 */
	public function getTypeId()
	{
		if( isset( $this->values['service.typeid'] ) ) {
			return (string) $this->values['service.typeid'];
		}
	}


	/**
	 * Sets the type ID of the service item.
	 *
	 * @param string Type ID of the service item
	 * @return \Aimeos\MShop\Service\Item\Iface Service item for chaining method calls
	 */
	public function setTypeId( $typeId )
	{
		if( (string) $typeId !== $this->getTypeId() )
		{
			$this->values['service.typeid'] = (string) $typeId;
			$this->setModified();
		}

		return $this;
	}


	/**
	 * Returns the name of the service provider the item belongs to.
	 *
	 * @return string Name of the service provider
	 */
	public function getProvider()
	{
		if( isset( $this->values['service.provider'] ) ) {
			return (string) $this->values['service.provider'];
		}

		return '';
	}


	/**
	 * Sets the new name of the service provider the item belongs to.
	 *
	 * @param string $provider Name of the service provider
	 * @return \Aimeos\MShop\Service\Item\Iface Service item for chaining method calls
	 */
	public function setProvider( $provider )
	{
		if( (string) $provider !== $this->getProvider() )
		{
			if( preg_match( '/^[A-Za-z0-9]+(,[A-Za-z0-9]+)*$/', $provider ) !== 1 ) {
				throw new \Aimeos\MShop\Service\Exception( sprintf( 'Invalid provider name "%1$s"', $provider ) );
			}

			$this->values['service.provider'] = (string) $provider;
			$this->setModified();
		}

		return $this;
	}


	/**
	 * Returns the label of the service item payment if available.
	 *
	 * @return string Service item label
	 */
	public function getLabel()
	{
		if( isset( $this->values['service.label'] ) ) {
			return (string) $this->values['service.label'];
		}

		return '';
	}


	/**
	 * Sets the label of the service item payment.
	 *
	 * @param string label of the service item payment
	 * @return \Aimeos\MShop\Service\Item\Iface Service item for chaining method calls
	 */
	public function setLabel( $label )
	{
		if( (string) $label !== $this->getLabel() )
		{
			$this->values['service.label'] = (string) $label;
			$this->setModified();
		}

		return $this;
	}


	/**
	 * Returns the starting point of time, in which the service is available.
	 *
	 * @return string|null ISO date in YYYY-MM-DD hh:mm:ss format
	 */
	public function getDateStart()
	{
		if( isset( $this->values['service.datestart'] ) ) {
			return (string) $this->values['service.datestart'];
		}
	}


	/**
	 * Sets a new starting point of time, in which the service is available.
	 *
	 * @param string|null New ISO date in YYYY-MM-DD hh:mm:ss format
	 * @return \Aimeos\MShop\Product\Item\Iface Product item for chaining method calls
	 */
	public function setDateStart( $date )
	{
		if( $date !== $this->getDateStart() )
		{
			$this->values['service.datestart'] = $this->checkDateFormat( $date );
			$this->setModified();
		}

		return $this;
	}


	/**
	 * Returns the ending point of time, in which the service is available.
	 *
	 * @return string|null ISO date in YYYY-MM-DD hh:mm:ss format
	 */
	public function getDateEnd()
	{
		if( isset( $this->values['service.dateend'] ) ) {
			return (string) $this->values['service.dateend'];
		}
	}


	/**
	 * Sets a new ending point of time, in which the service is available.
	 *
	 * @param string|null New ISO date in YYYY-MM-DD hh:mm:ss format
	 * @return \Aimeos\MShop\Product\Item\Iface Product item for chaining method calls
	 */
	public function setDateEnd( $date )
	{
		if( $date !== $this->getDateEnd() )
		{
			$this->values['service.dateend'] = $this->checkDateFormat( $date );
			$this->setModified();
		}

		return $this;
	}


	/**
	 * Returns the configuration values of the item
	 *
	 * @return array Configuration values
	 */
	public function getConfig()
	{
		if( isset( $this->values['service.config'] ) ) {
			return (array) $this->values['service.config'];
		}

		return [];
	}


	/**
	 * Sets the configuration values of the item.
	 *
	 * @param array $config Configuration values
	 * @return \Aimeos\MShop\Service\Item\Iface Service item for chaining method calls
	 */
	public function setConfig( array $config )
	{
		$this->values['service.config'] = $config;
		$this->setModified();

		return $this;
	}


	/**
	 * Returns the position of the service item in the list of deliveries.
	 *
	 * @return integer Position in item list
	 */
	public function getPosition()
	{
		if( isset( $this->values['service.position'] ) ) {
			return (int) $this->values['service.position'];
		}

		return 0;
	}


	/**
	 * Sets the new position of the service item in the list of deliveries.
	 *
	 * @param integer $pos Position in item list
	 * @return \Aimeos\MShop\Service\Item\Iface Service item for chaining method calls
	 */
	public function setPosition( $pos )
	{
		if( (int) $pos !== $this->getPosition() )
		{
			$this->values['service.position'] = (int) $pos;
			$this->setModified();
		}

		return $this;
	}


	/**
	 * Returns the status of the item.
	 *
	 * @return integer Status of the item
	 */
	public function getStatus()
	{
		if( isset( $this->values['service.status'] ) ) {
			return (int) $this->values['service.status'];
		}

		return 0;
	}


	/**
	 * Sets the status of the item.
	 *
	 * @param integer $status Status of the item
	 * @return \Aimeos\MShop\Service\Item\Iface Service item for chaining method calls
	 */
	public function setStatus( $status )
	{
		if( (int) $status !== $this->getStatus() )
		{
			$this->values['service.status'] = (int) $status;
			$this->setModified();
		}

		return $this;
	}


	/**
	 * Returns the item type
	 *
	 * @return string Item type, subtypes are separated by slashes
	 */
	public function getResourceType()
	{
		return 'service';
	}


	/**
	 * Tests if the item is available based on status, time, language and currency
	 *
	 * @return boolean True if available, false if not
	 */
	public function isAvailable()
	{
		return parent::isAvailable() && (bool) $this->getStatus()
			&& ( $this->getDateStart() === null || $this->getDateStart() < $this->values['date'] )
			&& ( $this->getDateEnd() === null || $this->getDateEnd() > $this->values['date'] );
	}


	/**
	 * Sets the item values from the given array.
	 *
	 * @param array $list Associative list of item keys and their values
	 * @return array Associative list of keys and their values that are unknown
	 */
	public function fromArray( array $list )
	{
		$unknown = [];
		$list = parent::fromArray( $list );
		unset( $list['service.type'], $list['service.typename'] );

		foreach( $list as $key => $value )
		{
			switch( $key )
			{
				case 'service.typeid': $this->setTypeId( $value ); break;
				case 'service.code': $this->setCode( $value ); break;
				case 'service.label': $this->setLabel( $value ); break;
				case 'service.provider': $this->setProvider( $value ); break;
				case 'service.position': $this->setPosition( $value ); break;
				case 'service.datestart': $this->setDateStart( $value ); break;
				case 'service.dateend': $this->setDateEnd( $value ); break;
				case 'service.config': $this->setConfig( $value ); break;
				case 'service.status': $this->setStatus( $value ); break;
				default: $unknown[$key] = $value;
			}
		}

		return $unknown;
	}


	/**
	 * Returns the item values as array.
	 *
	 * @param boolean True to return private properties, false for public only
	 * @return array Associative list of item properties and their values
	 */
	public function toArray( $private = false )
	{
		$list = parent::toArray( $private );

		$list['service.typename'] = $this->getTypeName();
		$list['service.type'] = $this->getType();
		$list['service.code'] = $this->getCode();
		$list['service.label'] = $this->getLabel();
		$list['service.provider'] = $this->getProvider();
		$list['service.position'] = $this->getPosition();
		$list['service.datestart'] = $this->getDateStart();
		$list['service.dateend'] = $this->getDateEnd();
		$list['service.config'] = $this->getConfig();
		$list['service.status'] = $this->getStatus();

		if( $private === true ) {
			$list['service.typeid'] = $this->getTypeId();
		}

		return $list;
	}

}
