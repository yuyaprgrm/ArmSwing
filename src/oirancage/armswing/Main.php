<?php

namespace oirancage\armswing;

use pocketmine\plugin\PluginBase;

class Main extends PluginBase
{
    protected function onEnable(): void{
        $this->getServer()->getPluginManager()->registerEvents(new EventListener(), $this);
    }
}