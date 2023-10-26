<?php
//08.01.2020 21:00
// Иванов.К
//08.01.2020 21:10

namespace ThisMadCatPDD;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\math\Vector3;

Class TMC extends PluginBase implements Listener{


  function onEnable() {
    $this->getLogger()->info('Plugin ПДД by ThisMadCat');
    $this->getLogger()->info('Плагин для сервера Rolling Role Play');
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
  }

  function onPDD(PlayerInteractEvent $event) { //аптечка
    $p = $event->getPlayer();
    $x = $event->getBlock()->getFloorX();
    $y = $event->getBlock()->getFloorY();
    $z = $event->getBlock()->getFloorZ();
    if ($x == 461 && $y == 67 && $z == 326){
      $p->sendMessage("§c1§7.Машину останавливать только на парковках или обочинах \n
      §c2§7.На знаках снижения скорости вы обязаны ехать с определенно скоростью указанной на нем \n
      §c3§7.Если водитель собьёт пешехода он обязан будет в суде выплатить ущерб в размере §350000§7$ постродавшему либо его лишат на 10 лет свободы (100 мин)\n
      §c4§7.Если водитель врежиться в чей то автомобиль он будет осужден и он обязан будет выплатить цену автомобиля иначе его лишат свободы на 1 год (10 мин)\n
      §c5§7.Если водитель будет вне трезвом состоянии ехать за рулем, он будет посажен за решетку на 5 лет (50 мин) и будет лишен водительских прав на 10 лет (10 дней)\n
      §c6§7.Если водителя столкнет другой водитель с моста то сбивший автомобилист будет лишен водительских прав на пожизненно т.к он тяжело ранит пострадавшего и принесет ущерб вещам пострадавшего либо он должен будет выплатить§3 1000000§7$");
    }
  }
}
