<?php 

namespace usy4\Tyho\commands;

/*  
 *  A plugin for PocketMine-MP.
 *
 *	This program is free software: you can redistribute it and/or modify
 *	it under the terms of the GNU General Public License as published by
 *	the Free Software Foundation, either version 3 of the License, or
 *	(at your option) any later version.
 *
 *	This program is distributed in the hope that it will be useful,
 *	but WITHOUT ANY WARRANTY; without even the implied warranty of
 *	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *	GNU General Public License for more details.
 *
 *	You should have received a copy of the GNU General Public License
 *	along with this program.  If not, see <http://www.gnu.org/licenses/>.
 * 	
 */

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginOwned;
use pocketmine\plugin\Plugin;
use pocketmine\player\Player;

use usy4\Tyho\Main;

class SwapBallCommand extends Command implements PluginOwned
{
	public function __construct(
		public Main $plugin
	) {
		parent::__construct("tyho", "Take your head off", null, null);
                $this->setPermission("tyho.command");
	}
	
	public function execute(CommandSender $sender, string $commandLabel, array $args) { 
    if(!$this->testPermission($sender)) return;
	
    if(!$sender instanceof Player) {
			$sender->sendMessage("use this command in game");
			return;
		}

		$this->plugin->setSkin($sender);
    
	}
	
	public function getOwningPlugin(): Plugin{
		return $this->plugin;
	}
}
