<?php

namespace Amasty\GoogleMap\Model\Config;

use Magento\Framework\Option\ArrayInterface;

/**
 * Yue can get all available types by google.maps.MapTypeId in js
 */
class MapType implements ArrayInterface
{
    const SATELLITE = 'satellite';

    const HYBRID = 'hybrid';

    const TERRAIN = 'terrain';

    const ROADMAP = 'roadmap';

    /**
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => self::ROADMAP, 'label' => __('Roadmap')],
            ['value' => self::SATELLITE, 'label' => __('Satellite')],
            ['value' => self::HYBRID, 'label' => __('Hybrid')],
            ['value' => self::TERRAIN, 'label' => __('Terrain')]
        ];
    }
}
