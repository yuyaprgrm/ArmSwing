<?php

namespace oirancage\armswing;

use pocketmine\entity\animation\ArmSwingAnimation;
use pocketmine\event\Listener;
use pocketmine\event\server\DataPacketReceiveEvent;
use pocketmine\network\mcpe\protocol\LevelSoundEventPacket;
use pocketmine\network\mcpe\protocol\types\LevelSoundEvent;

class EventListener implements Listener
{
    public function __construct(
        private Setting $setting
    ){
    }

    public function onDataReceive(DataPacketReceiveEvent $event){
        $packet = $event->getPacket();
        if(!$packet instanceof LevelSoundEventPacket){
            return;
        }

        $player = $event->getOrigin()->getPlayer();
        if($player === null){
            return;
        }

        if($packet->sound === LevelSoundEvent::ATTACK_NODAMAGE){
            if($this->setting->isClickSoundEnabled())$player->getServer()->broadcastPackets($player->getViewers(), [clone $packet]);
            $player->broadcastAnimation(new ArmSwingAnimation($player));
        }
    }
}