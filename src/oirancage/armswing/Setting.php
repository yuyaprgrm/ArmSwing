<?php

namespace oirancage\armswing;

class Setting
{
    public function __construct(
        private bool $clickSoundEnable = true
    ){
    }

    /**
     * @return bool
     */
    public function isClickSoundEnabled(): bool
    {
        return $this->clickSoundEnable;
    }
}