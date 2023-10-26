<?php
//09.01.2020  19:15
// Иванов.К
//09.01.2020 19:25

namespace ThisMadCat;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;

use pocketmine\command\ConsoleCommandSender;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;

use pocketmine\Player;
use pocketmine\utils\TextFormat;
use pocketmine\event\Listener;
use pocketmine\entity\Entity;

class TMC extends PluginBase implements Listener {

  function onEnable(){
    $this->getLogger()->info(TextFormat::DARK_RED . 'Plugin Рост by ThisMadCat загружена');
    $this->getLogger()->info(TextFormat::DARK_GREEN . 'Автор плагина - vk.com/kivanov20040');
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
  }

  public function onCommand(CommandSender $sender, Command $command, String $label, array $args) :bool{
    if($command->getName() == "rost"){
      if ($sender->isOp()) {
        if(isset($args[1])){
          $player = $this->getServer()->getPlayer($args[0]);
          if($args[1] == "norm"){
            $player->getDataPropertyManager()->setPropertyValue(Entity::DATA_SCALE, Entity::DATA_TYPE_FLOAT, 1);
            $player->sendMessage("§a>§f Ваш рост изменён");
          }elseif($args[1] == "min"){
            $player->getDataPropertyManager()->setPropertyValue(Entity::DATA_SCALE, Entity::DATA_TYPE_FLOAT, 0.7);
            $player->sendMessage("§a>§f Ваш рост изменён");
          }elseif($args[1] == "big"){
            $player->getDataPropertyManager()->setPropertyValue(Entity::DATA_SCALE, Entity::DATA_TYPE_FLOAT, 1.2);
            $player->sendMessage("§a>§f Ваш рост изменён");

          }else{
            $sender->sendMessage("§7Использование: /rost <nick> <norm/min/big>");
            return false;
          }
        }else{
          $sender->sendMessage("§7Использование: /rost <nick> <norm/min/big>");
          return false;
        }
      }else{
        $sender->sendMessage("§7Данная команда доступна только ОПераторам§4!");
        return false;
      }
    return false;}

  }
}
