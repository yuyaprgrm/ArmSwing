<?php

namespace oirancage\armswing;

use pocketmine\plugin\PluginBase;

class Main extends PluginBase
{
    protected function onEnable(): void{
        $this->saveDefaultConfig();
        $setting = new Setting(
            $this->getConfig()->get("click-sound-enabled")
        );
        $this->getServer()->getPluginManager()->registerEvents(new EventListener($setting), $this);
    }
}