<?php

/*
 * ChestLocker (v1.2) by EvolSoft
 * Developer: EvolSoft (Flavius12)
 * Website: http://www.evolsoft.tk
 * Date: 27/12/2014 03:32 PM (UTC)
 * Copyright & License: (C) 2014 EvolSoft
 * Licensed under MIT (https://github.com/EvolSoft/ChestLocker/blob/master/LICENSE)
 */

namespace ChestLocker\Commands;

use pocketmine\plugin\PluginBase;
use pocketmine\permission\Permission;
use pocketmine\command\Command;
use pocketmine\command\CommandExecutor;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;

use ChestLocker\Main;

class LockChest extends PluginBase{
	public function __construct(Main $plugin){
		$this->plugin = $plugin;
	}
	
	public function onCommand(CommandSender $sender, Command $cmd, $label, array $args) {
		$fcmd = strtolower($cmd->getName());
		switch($fcmd){
			case "lock":
				if($sender->hasPermission("chestlocker.commands.lockchest")){
					//Player Sender
					if($sender instanceof Player){
						if($this->plugin->getCommandStatus($sender->getName()) == 0 || $this->plugin->getCommandStatus($sender->getName()) == 2){
							$this->plugin->setCommandStatus(1, $sender->getName());
							$sender->sendMessage($this->plugin->SetColors("&", Main::PREFIX . "&2" . Main::ITEM_NAME . " 上锁模式开启 . 单击 " . Main::ITEM_NAME_2 . " 来上锁"));
						}else{
							$this->plugin->setCommandStatus(0, $sender->getName());
							$sender->sendMessage($this->plugin->SetColors("&", Main::PREFIX . "&4" . Main::ITEM_NAME . " 上锁模式关闭 ."));
						}
					}
					//Console Sender
					else{
						$sender->sendMessage($this->plugin->SetColors("&", Main::PREFIX . "&c 你只能在游戏中使用此命令"));
						return true;
					}
				}else{
					$sender->sendMessage($this->plugin->SetColors("&", "&c 你没有权限使用此命令"));
					break;
				}
				return true;
		}
	}
}
?>