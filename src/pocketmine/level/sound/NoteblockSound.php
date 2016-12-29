<?php
namespace pocketmine\level\sound;

use pocketmine\math\Vector3;
use pocketmine\network\protocol\LevelSoundEventPacket;

class NoteblockSound extends GenericSound{
	protected $instrument;
	protected $pitch;

	const INSTRUMENT_PIANO = 0;
	const INSTRUMENT_BASS_DRUM = 1;
	const INSTRUMENT_CLICK = 2;
	const INSTRUMENT_TABOUR = 3;
	const INSTRUMENT_BASS = 4;

	public function __construct(Vector3 $pos, $instrument = self::INSTRUMENT_PIANO, $pitch = 0){
		parent::__construct($pos, $instrument, $pitch);
		$this->instrument = $instrument;
		$this->pitch = $pitch;
	}

	public function encode(){
		$pk = new LevelSoundEventPacket();
		$pk->sound = LevelSoundEventPacket::SOUND_NOTE;
		$pk->x = $this->x;
		$pk->y = $this->y;
		$pk->z = $this->z;
		$pk->type = $this->instrument;
		$pk->pitch = $this->pitch;
		$pk->unknownBool = false;
		$pk->unknownBool2 = false;
		return $pk;
	}
}
