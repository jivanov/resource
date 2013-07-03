<?php

namespace Level3\Hal\Formatter;

use Level3\Hal\Formatter\JsonFormatter;
use Level3\Messages\Exceptions\NotAcceptable;

class FormatterFactory
{
    const CONTENT_TYPE_APPLICATION_HAL_JSON = 'application/hal+json';
    const CONTENT_TYPE_APPLICATION_HAL_XML = 'application/hal+xml';

    public function create(array $contentTypes)
    {
        if (count($contentTypes) === 0) {
            return new JsonFormatter();
        }

        foreach ($contentTypes as $contentType) {
            switch($contentType){
                case self::CONTENT_TYPE_APPLICATION_HAL_XML:
                    return new XmlFormatter();
                case self::CONTENT_TYPE_APPLICATION_HAL_JSON:
                    return new JsonFormatter();
            }
        }

        throw new NotAcceptable();
    }
}