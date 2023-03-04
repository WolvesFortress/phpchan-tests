<?php

declare(strict_types=1);

namespace YourNamespace;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\network\mcpe\protocol\LevelEventPacket;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class YourPlugin extends PluginBase implements Listener {

    /** @var Config */
    private $bannedPlayers;

    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->bannedPlayers = new Config($this->getDataFolder() . "banned_players.yml", Config::YAML, []);
    }

    public function onPlayerJoin(PlayerJoinEvent $event) {
        $player = $event->getPlayer();
        $name = $player->getName();
        $this->getServer()->broadcastMessage("Welcome, " . $name . "!");
        $this->strikeLightning($player);
        $this->playSound($player, LevelEventPacket::EVENT_SOUND_TOTEM);
    }

    public function onPlayerQuit(PlayerQuitEvent $event) {
        $player = $event->getPlayer();
        $name = $player->getName();
        $this->getServer()->broadcastMessage($name . " has left the server.");
        $this->banPlayer($player);
    }

    private function strikeLightning($player) {
        $packet = new LevelEventPacket();
        $packet->evid = LevelEventPacket::EVENT_SOUND_THUNDER;
        $packet->data = 0;
        $packet->position = $player;
        $player->getLevel()->broadcastPacketToViewers($player, $packet);
    }

    private function playSound($player, $sound) {
        $packet = new LevelEventPacket();
        $packet->evid = $sound;
        $packet->data = 0;
        $packet->position = $player;
        $player->getLevel()->broadcastPacketToViewers($player, $packet);
    }

    private function banPlayer($player) {
        $name = $player->getName();
        $this->bannedPlayers->set($name, true);
        $this->bannedPlayers->save();
        $player->kick("You have been banned from this server.");
    }

}
