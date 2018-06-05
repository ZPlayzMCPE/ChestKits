<?php

declare(strict_types=1);

namespace ChestKits;

use pocketmine\block\Block;

use pocketmine\command\{Command, CommandSender};

use pocketmine\item\enchantment\{Enchantment, EnchantmentInstance};

use pocketmine\inventory\ChestInventory;

use pocketmine\item\{Item, ItemFactory};

use pocketmine\{Player, Server};

use pocketmine\plugin\PluginBase;

use pocketmine\nbt\{NBT, tag\CompoundTag, tag\IntTag, tag\ListTag, tag\StringTag};

use pocketmine\tile\{Tile, Chest};

use pocketmine\utils\TextFormat as C;

class Main extends PluginBase {

    public function onEnable() : void {
        $this->getLogger()->info("ChestKits Enabled");
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool {

        if(!$sender instanceof Player){
            $sender->sendMessage(TextFormat::RED . "Command must be used in-game.");
            return true;
        }
        switch($command){
            case "starter":
                $helmet = Item::get(298, 0, 1);
                $helmet->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::PROTECTION)));
                $helmet->setCustomName("§eStarter Helmet");
                $chestplate = Item::get(299, 0, 1);
                $chestplate->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::PROTECTION)));
                $chestplate->setCustomName("§eStarter ChestPlate");
                $leggings = Item::get(300, 0, 1);
                $leggings->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::PROTECTION)));
                $leggings->setCustomName("§eStarter Leggings");
                $boots = Item::get(301, 0, 1);
                $boots->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::PROTECTION)));
                $boots->setCustomName("§eStarter Boots");
                $sword = Item::get(272, 0, 1);
                $sword->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::SHARPNESS)));
                $sword->setCustomName("§eStarter Sword");
                $pickaxe = Item::get(274, 0, 1);
                $pickaxe->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::EFFICIENCY)));
                $pickaxe->setCustomName("§eStarter Pickaxe");
                $shovel = Item::get(273, 0, 1);
                $shovel->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::EFFICIENCY)));
                $shovel->setCustomName("§eStarter Shovel");
                $Axe = Item::get(275, 0, 1);
                $axe->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::EFFICIENCY)));
                $axe->setCustomName("§eStarter Axe");
                $nbt = new CompoundTag("BlockEntityTag", [new ListTag("Items", [$helmet->nbtSerialize(0), $chestplate->nbtSerialize(1), $leggings->nbtSerialize(2), $boots->nbtSerialize(3), $sword->nbtSerialize(4), $pickaxe->nbtSerialize(5), $shovel->nbtSerialize(6), $axe->nbtSerialize(7)])]);
                $chest = ItemFactory::get(Block::CHEST, 1, 1);
                $chest->setNamedTagEntry($nbt);
                $chest->setCustomName("§a§lStarter kit! §bTap me!");
                $sender->getInventory()->addItem($chest);
                break;
        }
        case "weekly":
                $helmet = Item::get(, 0, 1);
                $helmet->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::PROTECTION)));
                $helmet->setCustomName("§eStarter Helmet");
                $chestplate = Item::get(299, 0, 1);
                $chestplate->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::PROTECTION)));
                $chestplate->setCustomName("§eStarter ChestPlate");
                $leggings = Item::get(300, 0, 1);
                $leggings->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::PROTECTION)));
                $leggings->setCustomName("§eStarter Leggings");
                $boots = Item::get(301, 0, 1);
                $boots->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::PROTECTION)));
                $boots->setCustomName("§eStarter Boots");
                $sword = Item::get(272, 0, 1);
                $sword->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::SHARPNESS)));
                $sword->setCustomName("§eStarter Sword");
                $pickaxe = Item::get(274, 0, 1);
                $pickaxe->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::EFFICIENCY)));
                $pickaxe->setCustomName("§eStarter Pickaxe");
                $nbt = new CompoundTag("BlockEntityTag", [new ListTag("Items", [$helmet->nbtSerialize(0), $chestplate->nbtSerialize(1), $leggings->nbtSerialize(2), $boots->nbtSerialize(3), $sword->nbtSerialize(4)])]);
                $chest = ItemFactory::get(Block::CHEST, 2, 1);
                $chest->setNamedTagEntry($nbt);
                $chest->setCustomName("§a§lStarter kit! §bTap me!");
                $sender->getInventory()->addItem($chest);
                break;
        }
        return true; 
    }
}
