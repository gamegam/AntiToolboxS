<?php

namespace antibox;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerLoginEvent;
use pocketmine\plugin\PluginBase;

class antibox extends PluginBase implements Listener {

    public function onEnable(): void {
        $this->getServer ()->getPluginManager ()->registerEvents ( $this, $this );
    }
    public function onLogin(PlayerLoginEvent $ev){
        $p = $ev->getPlayer();
        $name = $p->getName();
        $data = $p->getPlayerInfo()->getExtraData();
        $o = (int)$data["DeviceOS"];
        $m = (string)$data["DeviceModel"];
        if($o == 1 ){
            $device = explode(" ", $m);
            if(isset($device[0])){
                $m = strtoupper($device[0]);
                if($m !== $device[0]){
                        $this->getServer()->broadcastMessage("{$name}님이 비정상 애플케이션으로 접속하셨습니다.");
                        $p->kick("비정상 프로그램으로 접속하지마세요.", false);
                        $ev->cancel();
                    }
                }

            }
        }
    }
