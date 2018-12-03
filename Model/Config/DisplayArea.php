<?php

namespace Amasty\GoogleMap\Model\Config;

use Magento\Framework\Option\ArrayInterface;

class DisplayArea implements ArrayInterface
{
    const TOP = 'top';

    const BOTTOM = 'bottom';

    const NONE = 'no';

    /**
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => self::TOP, 'label' => __('Top')],
            ['value' => self::BOTTOM, 'label' => __('Bottom')],
            ['value' => self::NONE, 'label' => __('Do not display on \'Contact Us\', enable as a widget')]
        ];
    }
}
