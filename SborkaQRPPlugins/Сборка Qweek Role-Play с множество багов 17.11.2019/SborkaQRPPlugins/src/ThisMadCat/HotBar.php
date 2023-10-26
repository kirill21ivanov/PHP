<?php

namespace ThisMadCat;

use pocketmine\scheduler\Task;
use ThisMadCat\STMC;
use pocketmine\math\Vector3;

Class HotBar extends Task{

  private $p, $time;

  public function __construct(STMC $plugin) {
    $this->p = $plugin;
  }

  function onRun($currentTick): void{
    $this->time++;
    foreach ($this->p->getServer()->getOnlinePlayers() as $player) {
      $ra = $this->p->ra->getAll();
      $ros = $this->p->ros->getAll();
      $data = $this->p->cares->getAll();
      $right = str_repeat(" ", 60);
      $t = time() + (3 * 60 * 60);
      $time = gmdate("H:i:s, $t");
      $nametag = $player->getNametag();
      $name = $player->getName();
      $onli = count($this->p->getServer()->getOnlinePlayers());
      $money = $ra["mon"][$player->getName()];
      $player->sendPopup("" . $right . "§eQweek Rоle-Plаy\n" . $right . "§eУровень Розыска: " . $ros["ros"][$player->getName()] . "\n" . $right . "§eБаланс: " . $money . "§e\n" . $right . "§eВремя по МСК: " . date("H:i:s") . "\n" . $right ."§eОнлайн: " . $onli . "\n" . $right . "§eУровень: " .  $data[$player->getName()]['lvl'] . " \n" . $right);
    }
  }

}
