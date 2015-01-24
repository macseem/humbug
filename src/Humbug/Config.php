<?php

/**
 * Humbug
 *
 * @category   Humbug
 * @package    Humbug
 * @copyright  Copyright (c) 2015 Pádraic Brady (http://blog.astrumfutura.com)
 * @license    https://github.com/padraic/humbug/blob/master/LICENSE New BSD License
 *
 * @author     rafal.wartalski@gmail.com
 */

namespace Humbug;

use Humbug\Exception\JsonConfigException;

class Config
{
    private $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function getSource()
    {
        if (!isset($this->config->source)) {
            throw new JsonConfigException(
                'Source code data is not included in configuration file'
            );
        }

        if (!isset($this->config->source->directories) && !isset($this->config->source->excludes)) {
            throw new JsonConfigException(
                'You must set at least one source directory or exclude in the configuration file'
            );
        }

        return $this->config->source;
    }
}