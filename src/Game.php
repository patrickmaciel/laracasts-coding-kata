<?php

namespace App;

class Game
{
    const FRAMES_PER_GAME = 10;
    protected array $rolls = [];

    public function roll(int $pins)
    {
        $this->rolls[] = $pins;
    }

    public function score()
    {
        $score = 0;
        $roll = 0;

        foreach (range(1, self::FRAMES_PER_GAME) as $frame) {
            if ($this->isStrike($roll)) {
                $score += $this->rolls[$roll];
                $score += $this->strikeBonus($roll);

                $roll += 1;
                continue;
            }

            if ($this->isSpare($roll)) {
                $score += $this->defaultFrameScore($roll);
                $score += $this->spareBonus($roll);

                $roll += 2;
                continue;
            }

            $score += $this->defaultFrameScore($roll);
            $roll += 2;
        }

        return $score;
    }

    public function isStrike(int $roll): bool
    {
        return $this->rolls[$roll] === 10;
    }

    public function isSpare(int $roll): bool
    {
        return $this->defaultFrameScore($roll) == 10;
    }

    public function defaultFrameScore(int $roll): int
    {
        return $this->rolls[$roll] + $this->rolls[$roll + 1];
    }

    public function strikeBonus(int $roll)
    {
        return $this->rolls[$roll + 1] + $this->spareBonus($roll);
    }

    public function spareBonus(int $roll): int
    {
        return $this->rolls[$roll + 2];
    }
}
