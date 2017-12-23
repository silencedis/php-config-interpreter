<?php

namespace SilenceDis\MultiSourceMapper\MSMInterface\TargetBuilder;

/**
 * Interface TargetBuilderInterface
 *
 * @author Yurii Slobodeniuk <silencedis@gmail.com>
 */
interface TargetBuilderInterface
{
    public function setProperty(string $property, $value);

    public function save();
}
