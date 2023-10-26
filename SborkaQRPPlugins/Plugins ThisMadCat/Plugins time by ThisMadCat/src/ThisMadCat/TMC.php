<?php
//10.07.2019 15:35
// Иванов.К
//10.07.2019 15:40

namespace ThisMadCat;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;

use pocketmine\command\ConsoleCommandSender;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;

use pocketmine\Player;
use pocketmine\utils\TextFormat;

class TMC extends PluginBase{

  function onEnable(){
    $this->getLogger()->info(TextFormat::DARK_RED . 'Plugin time by ThisMadCat загружена');
    $this->getLogger()->info(TextFormat::DARK_GREEN . 'Автор плагина - vk.com/kivanov20040');
    $this->getLogger()->info(TextFormat::DARK_GREEN . 'Плагин для Даньки от Иванова Кирилла ');
  }

  public function onCommand(CommandSender $sender, Command $command, String $label, array $args) :bool{
    if($command->getName() == "day"){
      $sender->sendMessage("§e[А]§7Вы §aвключили§7 день.");
      $sender->sendPopup("♣§e§lDay♣");
      $this->getServer()->broadcastMessage("§cАдминистратор " . $sender->getName() . ": Включил на сервере день.");
      $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "time set 0");
    return false;}

    if($command->getName() == "night"){
      $sender->sendMessage("§e[А]§7Вы §aвключили§7 ночь.");
      $sender->sendPopup("♣§b§lNight♣");
      $this->getServer()->broadcastMessage("§cАдминистратор " . $sender->getName() . ": Включил на сервере ночь.");
      $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "time set 18000");
    return false;}
  }
}
