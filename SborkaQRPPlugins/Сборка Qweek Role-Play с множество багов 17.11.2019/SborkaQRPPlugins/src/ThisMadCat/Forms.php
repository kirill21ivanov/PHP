<?php

namespace ThisMadCat;

use pocketmine\scheduler\Task;
use ThisMadCat\STMC;
use pocketmine\math\Vector3;

Class Forms extends Task{

  private $p, $time;

  public function __construct(STMC $plugin) {
    $this->p = $plugin;
  }

  function onRun($currentTick): void{
    $this->time++;
    foreach ($this->p->getServer()->getOnlinePlayers() as $player) {
      $money = $this->p->ra->getAll();
      $ros = $this->p->ros->getAll();
      $data = $this->p->cares->getAll();
      if(!isset($money["mon"][$player->getName()])){
        $money["mon"][$player->getName()] = 100;
        $this->p->ra->setAll($money);
        $this->p->ra->save();
        $ros["ros"][$player->getName()] = 0;
        $this->p->ros->setAll($ros);
        $this->p->ros->save();
        $data[$player->getName()]['car'] = 0;
        $data[$player->getName()]['fuel'] = 0;
        $data[$player->getName()]['lock'] = "open";
        $data[$player->getName()]['lvl'] = 1;
        $data[$player->getName()]['exp'] = 1;
        $data[$player->getName()]['zak'] = 1;
        $data[$player->getName()]['promo'] = 0;
        $data[$player->getName()]['pills'] = 70;
        $data[$player->getName()]['apteka'] = 0;
        $data[$player->getName()]['gunlic'] = "Нету";
        $data[$player->getName()]['druglic'] = "Нету";
        $this->p->cares->setAll($data);
        $this->p->cares->save();
      }
    }
  }

}
