<?php
/**
 * UltraPlugin
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the ultraplugin.com license that is
 * available through the world-wide-web at this URL:
 * https://ultraplugin.com/end-user-license-agreement
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    UltraPlugin
 * @package     Ultraplugin_ChatGpt
 * @copyright   Copyright (c) UltraPlugin (https://ultraplugin.com/)
 * @license     https://ultraplugin.com/end-user-license-agreement
 */

namespace Ultraplugin\ChatGpt\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{
    /**
     * Config XML paths
     */
    public const XML_PATH_IS_ENABLED = 'chatgpt/general/enabled';
    public const XML_PATH_API_KEY = 'chatgpt/general/api_secret';
    public const XML_PATH_DESCRIPTION_WORD_COUNT = 'chatgpt/general/description_words_count';
    public const XML_PATH_SHORT_DESCRIPTION_WORD_COUNT = 'chatgpt/general/short_description_words_count';
    public const XML_PATH_PRODUCT_ATTRIBUTE = 'chatgpt/general/attribute';

    /**
     * Get config value
     *
     * @param string $path
     * @return mixed
     */
    public function getConfig($path)
    {
        return $this->scopeConfig->getValue($path);
    }

    /**
     * Check is extension is enabled
     *
     * @return bool
     */
    public function isEnabled()
    {
        return $this->scopeConfig->isSetFlag(self::XML_PATH_IS_ENABLED);
    }

    /**
     * Get API secret
     *
     * @return string
     */
    public function getApiSecret()
    {
        return $this->getConfig(self::XML_PATH_API_KEY);
    }

    /**
     * Get number of description words
     *
     * @return int
     */
    public function getDescriptionWordCount()
    {
        return (int) $this->getConfig(self::XML_PATH_DESCRIPTION_WORD_COUNT);
    }

    /**
     * Get number of short description words
     *
     * @return int
     */
    public function getShortDescriptionWordCount()
    {
        return (int) $this->getConfig(self::XML_PATH_SHORT_DESCRIPTION_WORD_COUNT);
    }

    /**
     * Get max token
     *
     * @param string $type
     * @return int
     */
    public function getMaxToken($type)
    {
        if ($type == 'short') {
            $maxToken = $this->getShortDescriptionWordCount();
        } else {
            $maxToken = $this->getDescriptionWordCount();
        }
        return $maxToken;
    }

    /**
     * Get product attribute code
     *
     * @return mixed
     */
    public function getProductAttribute()
    {
        return $this->getConfig(self::XML_PATH_PRODUCT_ATTRIBUTE);
    }
}
