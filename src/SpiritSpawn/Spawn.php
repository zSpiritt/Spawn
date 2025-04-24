<?php

namespace SpiritSpawn;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\lang\Translatable;
use pocketmine\player\Player;
use pocketmine\world\Position;

class Spawn extends Command
{
    public function __construct()
    {
        parent::__construct(Main::$config->get("command-name"), Main::$config->get("command-description"));
        $this->setPermission("spawn.cmd");
    }

     public function execute(CommandSender $sender, string $commandLabel, array $args)
              {
         if (!$sender instanceof Player) {
             $sender->sendMessage(Main::$config->get("not-player"));
             return;
         }
         $sender->teleport(new Position(Main::$config->get("x"), Main::$config->get("y"), Main::$config->get("z"), $sender->getServer()->getWorldManager()->getWorldByName(Main::$config->get("world"))));
         $sender->sendMessage(Main::$config->get("message"));

     }
}