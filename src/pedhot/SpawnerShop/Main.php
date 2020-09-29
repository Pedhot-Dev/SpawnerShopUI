<?php

namespace pedhot\SpawnerShop;

use jojoe77777\FormAPI\SimpleForm;
use onebone\economyapi\EconomyAPI;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;

class Main extends PluginBase implements Listener
{

    public function onEnable()
    {
        Server::getInstance()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("Plugin Enabled");
        @mkdir($this->getDataFolder());
        $this->saveResource("config.yml");
        if (!$this->getConfig()->exists("config-version")){
            $this->getLogger()->notice("§eYour configuration file is from another version. Updating the Config...");
            $this->getLogger()->notice("§eThe old configuration file can be found at config_old.yml");
            rename($this->getDataFolder()."config.yml", $this->getDataFolder()."config_old.yml");
            $this->saveResource("config.yml");
        }
        if (version_compare("1.0", $this->getConfig()->get("config-version"))){
            $this->getLogger()->notice("§eYour configuration file is from another version. Updating the Config...");
            $this->getLogger()->notice("§eThe old configuration file can be found at config_old.yml");
            rename($this->getDataFolder()."config.yml", $this->getDataFolder()."config_old.yml");
            $this->saveResource("config.yml");
        }
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
    {
        $cmd = $command->getName();
        switch ($cmd){
            case "spawnershop":
                if (!$sender instanceof Player){
                    $sender->sendMessage("Ingame only");
                }else {
                    $this->onSpawnerUI($sender);
                }
                break;
        }
        return true;
    }

    public function onSpawnerUI(Player $sender)
    {
        $form = new SimpleForm(function (Player $sender, int $data = null){
            if ($data === null) {
                return true;
            }
            $economy = EconomyAPI::getInstance();
            $myMoney = $economy->myMoney($sender);
            switch ($data) {
                case '0':
                    $sheep = $this->getConfig()->getNested("price.sheep");
                    if ($myMoney >= $sheep){
                        $economy->reduceMoney($sender, $sheep);
                        $sender->getInventory()->addItem(\Heisenburger69\BurgerSpawners\Main::getInstance()->getSpawner("sheep", "1"));
                        $sender->sendMessage($this->getConfig()->getNested("message.success-buying"));
                    }else{
                        $sender->sendMessage($this->getConfig()->getNested("message.not-enough-money"););
                    }
                    break;
                case '1':
                    $cow = $this->getConfig()->getNested("price.cow");
                    if ($myMoney >= $cow){
                        $economy->reduceMoney($sender, $cow);
                        $sender->getInventory()->addItem(\Heisenburger69\BurgerSpawners\Main::getInstance()->getSpawner("cow", "1"));
                        $sender->sendMessage($this->getConfig()->getNested("message.success-buying"));
                    }else{
                        $sender->sendMessage($this->getConfig()->getNested("message.not-enough-money"););
                    }
                    break;
                case '2':
                    $pig = $this->getConfig()->getNested("price.pig");
                    if ($myMoney >= $pig){
                        $economy->reduceMoney($sender, $zombie);
                        $sender->getInventory()->addItem(\Heisenburger69\BurgerSpawners\Main::getInstance()->getSpawner("pig", "1"));
                        $sender->sendMessage($this->getConfig()->getNested("message.success-buying"));
                    }else{
                        $sender->sendMessage($this->getConfig()->getNested("message.not-enough-money"););
                    }
                    break;
                case '3':
                    $chicken = $this->getConfig()->getNested("price.chicken");
                    if ($myMoney >= $chicken){
                        $economy->reduceMoney($sender, $chicken);
                        $sender->getInventory()->addItem(\Heisenburger69\BurgerSpawners\Main::getInstance()->getSpawner("chicken", "1"));
                        $sender->sendMessage($this->getConfig()->getNested("message.success-buying"));
                    }else{
                        $sender->sendMessage($this->getConfig()->getNested("message.not-enough-money"););
                    }
                    break;
                case '4':
                    $bee = $this->getConfig()->getNested("price.bee");
                    if ($myMoney >= $bee){
                        $economy->reduceMoney($sender, $bee);
                        $sender->getInventory()->addItem(\Heisenburger69\BurgerSpawners\Main::getInstance()->getSpawner("bee", "1"));
                        $sender->sendMessage($this->getConfig()->getNested("message.success-buying"));
                    }else{
                        $sender->sendMessage($this->getConfig()->getNested("message.not-enough-money"););
                    }
                    break;
                case '5':
                    $zombie = $this->getConfig()->getNested("price.zombie");
                    if ($myMoney >= $zombie){
                        $economy->reduceMoney($sender, $zombie);
                        $sender->getInventory()->addItem(\Heisenburger69\BurgerSpawners\Main::getInstance()->getSpawner("zombie", "1"));
                        $sender->sendMessage($this->getConfig()->getNested("message.success-buying"));
                    }else{
                        $sender->sendMessage($this->getConfig()->getNested("message.not-enough-money"););
                    }
                    break;
                case '6':
                    $skeleton = $this->getConfig()->getNested("price.skeleton");
                    if ($myMoney >= $skeleton){
                        $economy->reduceMoney($sender, $skeleton);
                        $sender->getInventory()->addItem(\Heisenburger69\BurgerSpawners\Main::getInstance()->getSpawner("skeleton", "1"));
                        $sender->sendMessage($this->getConfig()->getNested("message.success-buying"));
                    }else{
                        $sender->sendMessage($this->getConfig()->getNested("message.not-enough-money"););
                    }
                    break;
                case '7':
                    $spider = $this->getConfig()->getNested("price.spider");
                    if ($myMoney >= $spider){
                        $economy->reduceMoney($sender, $spider);
                        $sender->getInventory()->addItem(\Heisenburger69\BurgerSpawners\Main::getInstance()->getSpawner("spider", "1"));
                        $sender->sendMessage($this->getConfig()->getNested("message.success-buying"));
                    }else{
                        $sender->sendMessage($this->getConfig()->getNested("message.not-enough-money"););
                    }
                    break;
                case '8':
                    $enderman = $this->getConfig()->getNested("price.enderman");
                    if ($myMoney >= $enderman){
                        $economy->reduceMoney($sender, $enderman);
                        $sender->getInventory()->addItem(\Heisenburger69\BurgerSpawners\Main::getInstance()->getSpawner("enderman", "1"));
                        $sender->sendMessage($this->getConfig()->getNested("message.success-buying"));
                    }else{
                        $sender->sendMessage($this->getConfig()->getNested("message.not-enough-money"););
                    }
                    break;
            }
        });
        $form->setTitle("Spawner Shop");
        $form->setContent("Your Money ".number_format($myMoney)."\n\n\n\n\n");
        $form->addButton("Sheep\n".number_format($this->getConfig()->getNested("price.sheep")));
        $form->addButton("Cow\n".number_format($this->getConfig()->getNested("price.cow")));
        $form->addButton("Pig\n".number_format($this->getConfig()->getNested("price.pig")));
        $form->addButton("Chicken\n".number_format($this->getConfig()->getNested("price.chicken")));
        $form->addButton("Bee\n".number_format($this->getConfig()->getNested("price.bee")));
        $form->addButton("Zombie\n".number_format($this->getConfig()->getNested("price.zombie")));
        $form->addButton("Skeleton\n".number_format($this->getConfig()->getNested("price.skeleton")));
        $form->addButton("Spider\n".number_format($this->getConfig()->getNested("price.spider")));
        $form->addButton("Enderman\n".number_format($this->getConfig()->getNested("price.enderman")));
        $form->sendToPlayer($sender);
        return $form;
    }
}