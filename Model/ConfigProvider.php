<?php
/**
 * Scope config Provider model
 */

namespace Amasty\GoogleMap\Model;

use Magento\Store\Model\ScopeInterface;

class ConfigProvider
{
    const PATH_PREFIX = 'amgooglemap';
    const XPATH_ENABLED = 'general/enabled';
    const XPATH_API_KEY = 'general/api_key';
    const XPATH_DRAGGABLE = 'general/draggable';
    const XPATH_ZOOM = 'general/zoom';
    const XPATH_MAP_TYPE = 'general/map_type';
    const XPATH_WIDTH = 'general/width';
    const XPATH_HEIGHT = 'general/height';
    const XPATH_DISPLAY_AREA = 'general/display_area';
    const XPATH_WRAP_BLOCK = 'general/wrap_block';
    const XPATH_ADDRESS = 'coordinates/address';
    const XPATH_LATITUDE = 'coordinates/latitude';
    const XPATH_LONGITUDE = 'coordinates/longitude';

    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * ConfigProvider constructor.
     *
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * An alias for scope config with default scope type SCOPE_STORE
     *
     * @param string $key
     * @param string $scopeType
     *
     * @return string|null
     */
    public function getValue($key, $scopeType = ScopeInterface::SCOPE_STORE)
    {
        return $this->scopeConfig->getValue(self::PATH_PREFIX . '/' . $key, $scopeType);
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return (bool)$this->getValue(self::XPATH_ENABLED);
    }

    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->getValue(self::XPATH_API_KEY);
    }

    /**
     * @return string
     */
    public function isDraggable()
    {
        return (bool)$this->getValue(self::XPATH_DRAGGABLE);
    }

    /**
     * @return string
     */
    public function getZoom()
    {
        return $this->getValue(self::XPATH_ZOOM);
    }

    /**
     * @return string
     */
    public function getMapType()
    {
        return $this->getValue(self::XPATH_MAP_TYPE);
    }

    /**
     * @return string
     */
    public function getWidth()
    {
        return $this->getValue(self::XPATH_WIDTH);
    }

    /**
     * @return string
     */
    public function getHeight()
    {
        return $this->getValue(self::XPATH_HEIGHT);
    }

    /**
     * @return string
     */
    public function getDisplayArea()
    {
        return $this->getValue(self::XPATH_DISPLAY_AREA);
    }

    /**
     * @return bool
     */
    public function isWrapBlock()
    {
        return (bool)$this->getValue(self::XPATH_WRAP_BLOCK);
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->getValue(self::XPATH_ADDRESS);
    }

    /**
     * @return string
     */
    public function getLatitude()
    {
        return $this->getValue(self::XPATH_LATITUDE);
    }

    /**
     * @return string
     */
    public function getLongitude()
    {
        return $this->getValue(self::XPATH_LONGITUDE);
    }
}
