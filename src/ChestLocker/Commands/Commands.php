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

class Commands extends PluginBase{
	public function __construct(Main $plugin){
		$this->plugin = $plugin;
	}
	
	public function onCommand(CommandSender $sender, Command $cmd, $label, array $args) {
		$fcmd = strtolower($cmd->getName());
    	switch($fcmd){
    		case "chestlocker":
    			if(isset($args[0])){
    				$args[0] = strtolower($args[0]);
    				if($args[0]=="help"){
    					if($sender->hasPermission("chestlocker.commands.help")){
    						$sender->sendMessage($this->plugin->SetColors("&", "&c|| &8ChestLocker Command &c||"));
    						$sender->sendMessage($this->plugin->SetColors("&", "&c/chlock info &8> Show The Chest Info"));
    						$sender->sendMessage($this->plugin->SetColors("&", "&c/chlock reload &8> Reload ChestLocker"));
    						$sender->sendMessage($this->plugin->SetColors("&", "&c/lockchest &8> Lock The " . Main::ITEM_NAME_2));
    						$sender->sendMessage($this->plugin->SetColors("&", "&c/unlockchest &8> Unlock The " . Main::ITEM_NAME_2));
    						break;
    					}else{
    						$sender->sendMessage($this->plugin->SetColors("&", "&cYou don't have permission to use this command!"));
    						break;
    					}
    				}elseif($args[0]=="reload"){
    					if($sender->hasPermission("chestlocker.commands.reload")){
    						$this->plugin->reloadConfig();
    			   	        $sender->sendMessage($this->plugin->SetColors("&", Main::PREFIX . "&aChestLocker Reload!."));
    				        break;
    					}else{
    						$sender->sendMessage($this->plugin->SetColors("&", "&cYou don't have permission to use this command!"));
    						break;
    					}
    				}elseif($args[0]=="info"){
    					if($sender->hasPermission("chestlocker.commands.info")){
    						$sender->sendMessage($this->plugin->SetColors("&", Main::PREFIX . "&8ChestLocker &cv" . Main::VERSION . " &8developed by&c " . Main::PRODUCER));
    			   	        $sender->sendMessage($this->plugin->SetColors("&", Main::PREFIX . "&8Website &c" . Main::MAIN_WEBSITE));
    				        break;
    					}else{
    						$sender->sendMessage($this->plugin->SetColors("&", "&cYou don't have permission to use this command!"));
    						break;
    					}
    				}
    				}else{
    					if($sender->hasPermission("chestlocker.commands.help")){
    						$sender->sendMessage($this->plugin->SetColors("&", "&c|| &8ChestLocker Command &c||"));
    						$sender->sendMessage($this->plugin->SetColors("&", "&c/chlock info &8> Show The Chest Info"));
    						$sender->sendMessage($this->plugin->SetColors("&", "&c/chlock reload &8> Reload ChestLocker"));
    						$sender->sendMessage($this->plugin->SetColors("&", "&c/lockchest &8> Lock The " . Main::ITEM_NAME_2));
    						$sender->sendMessage($this->plugin->SetColors("&", "&c/unlockchest &8> Unlock The " . Main::ITEM_NAME_2));
    						break;
    					}else{
    						$sender->sendMessage($this->plugin->SetColors("&", "&cYou don't have permission to use this command!"));
    						break;
    					}
    				}
    			}
	  }
}
?>