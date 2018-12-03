<?php

namespace Amasty\GoogleMap\Block;

use Amasty\GoogleMap\Model\Config\DisplayArea;
use Amasty\GoogleMap\Model\ConfigProvider;
use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

class Map extends Template implements BlockInterface
{
    /**
     * @var string
     */
    protected $_template = 'Amasty_GoogleMap::map.phtml';

    /**
     * @var ConfigProvider
     */
    private $configProvider;

    public function __construct(
        Template\Context $context,
        ConfigProvider $configProvider,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->configProvider = $configProvider;
    }

    /**
     * @inheritdoc
     */
    public function toHtml()
    {
        if (!$this->configProvider->isEnabled() ||
            ($this->getNameInLayout() == 'amasty_google_map_top'
                && $this->configProvider->getDisplayArea() != DisplayArea::TOP)
            || ($this->getNameInLayout() == 'amasty_google_map_bottom'
                && $this->configProvider->getDisplayArea() != DisplayArea::BOTTOM)
        ) {
            return '';
        }

        return parent::toHtml();
    }

    /**
     * Return map Element unic ID
     *
     * @return string
     */
    public function getMapId()
    {
        if (!$this->hasData('map_id')) {
            $this->setData('map_id', $this->escapeHtml(uniqid('amgooglemap-canvas')));
        }

        return $this->getData('map_id');
    }

    /**
     * @return string
     */
    public function getStyles()
    {
        $styles = sprintf(
            'width: %s; height: %s;',
            $this->escapeHtml($this->getMapWidth()),
            $this->escapeHtml($this->getMapHeight())
        );

        if (!$this->isWrap()) {
            $styles .= 'clear:both;';
        }

        return $styles;
    }

    /**
     * @return string
     */
    public function getStyleForAmastyLink()
    {
        $styles = 'float: right; padding-top: 1%;';
        return $styles;
    }

    /**
     * @return string
     */
    public function getMarkerTitle()
    {
        if (!$this->hasData('marker_title')) {
            $this->setData('marker_title', $this->configProvider->getAddress());
        }

        return $this->getData('marker_title');
    }

    /**
     * Return Google API Key with url parameter
     *
     * @param bool $isClean
     *
     * @return string
     */
    public function getApiKey($isClean = false)
    {
        $apiKey = $this->configProvider->getApiKey();
        if ($isClean || empty($apiKey)) {
            return '';
        }

        return "&key=" . $apiKey;
    }

    /**
     * Get map width style
     *
     * @return string
     */
    public function getMapWidth()
    {
        if (!$this->hasData('map_width')) {
            $this->setData('map_width', $this->configProvider->getWidth());
        }

        return $this->getData('map_width');
    }

    /**
     * Get map Height style
     *
     * @return string
     */
    public function getMapHeight()
    {
        if (!$this->hasData('map_height')) {
            $this->setData('map_height', $this->configProvider->getHeight());
        }

        return $this->getData('map_height');
    }

    /**
     * Get map Height style
     *
     * @return bool
     */
    public function isWrap()
    {
        if (!$this->hasData('wrap')) {
            $this->setData('wrap', $this->configProvider->isWrapBlock());
        }

        return (bool)$this->getData('wrap');
    }

    /**
     * Get map display type
     *
     * @return string
     */
    public function getMapType()
    {
        if (!$this->hasData('map_type')) {
            $this->setData('map_type', $this->configProvider->getMapType());
        }

        return $this->getData('map_type');
    }

    /**
     * Get map zoom on load
     *
     * @return string
     */
    public function getZoom()
    {
        if (!$this->hasData('zoom')) {
            $this->setData('zoom', $this->configProvider->getZoom());
        }

        return $this->getData('zoom');
    }

    /**
     * Get Latitude for Map center and Marker
     *
     * @return string
     */
    public function getLatitude()
    {
        if (!$this->hasData('lat')) {
            $this->setData('lat', $this->configProvider->getLatitude());
        }

        return $this->getData('lat');
    }

    /**
     * Get Longitude for Map center and Marker
     *
     * @return string
     */
    public function getLongitude()
    {
        if (!$this->hasData('long')) {
            $this->setData('long', $this->configProvider->getLongitude());
        }

        return $this->getData('long');
    }

    /**
     * Get Longitude for Map center and Marker
     *
     * @return string
     */
    public function getIsDraggable()
    {
        if (!$this->hasData('draggable')) {
            $this->setData('draggable', $this->configProvider->isDraggable());
        }

        return $this->getData('draggable');
    }
}
