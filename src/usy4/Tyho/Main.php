<?php

namespace usy4\Tyho;

use usy4\SwapBall\commands\TyhoCommand;

use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\entity\Skin;

class Main extends PluginBase {

  public function onEnable() : void{
    foreach(["tyho.json", "tyhoSlim.json"] as $files){
      $this->saveResource("geo" . "/" . $files);
    }
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->getServer()->getCommandMap()->register($this->getName(), new TyhoCommand($this));
  }
     
  public function setSkin(Player $player){    
    $skin = $player->getSkin();      
    if($player->getSkin()->getGeometryName() == "geometry.humanoid.customSlim"){                                   
      $player->setSkin(new Skin($skin->getSkinId(), $skin->getSkinData(), "", "geometry.tyhoSlim", file_get_contents($this->getDataFolder() . "geo" . "/" . "tyhoSlim" . ".json")));     
    } else {
      $player->setSkin(new Skin($skin->getSkinId(), $skin->getSkinData(), "", "geometry.tyho", file_get_contents($this->getDataFolder() . "geo" . "/" . "tyho" . ".json")));
    }   
    $player->sendSkin();
  }
    
}
