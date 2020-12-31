<?php

namespace BracketGenerator\Types;

use BracketGenerator\Assertions;

class SingleElimination implements Type
{
    private array $games = [];
    private array $gamesInRounds = [];
    private int $numberOfGames = 0;
    private int $currentRoundId = 1;
    private int $gameInCurrentRound = 0;
    private int $nextGameInRoundId = 0;

    public function generate(int $numberOfParticipants): array
    {
        Assertions::isPowerOfTwo($numberOfParticipants);

        $gamesInFirstRound = $numberOfParticipants / 2;

        $this->setNumberOfGames($numberOfParticipants);
        $this->setGamesQuantityInRounds($gamesInFirstRound);

        $this->iterateOverGames();

        return $this->games;
    }

    private function setNumberOfGames(int $numberOfParticipants): void
    {
        $this->numberOfGames = $numberOfParticipants - 1;
    }

    private function setGamesQuantityInRounds(int $gamesInRound, int $roundId = 1): void
    {
        $this->gamesInRounds[$roundId] = $gamesInRound;

        if ($this->isNotLastRound($gamesInRound)) {
            $this->setGamesQuantityInRounds($gamesInRound / 2, ++$roundId);
        }
    }

    private function iterateOverGames(): void
    {
        $currentRoundMaxGames = $this->getCurrentRoundMaxGames();

        for ($currentGameId = 1; $currentGameId <= $this->numberOfGames; $currentGameId++) {
            if ($this->isGameInSameRound()) { // Check if still in same round
                $this->gameInCurrentRound++;
            } else { // If next round
                $this->currentRoundId++;
                $currentRoundMaxGames += $this->getCurrentRoundMaxGames();
                $this->resetGameInCurrentRound();
                $this->resetNextGameInRoundId();
            }

            // Skip matches
            if ($this->shouldIncreaseNextGameInRoundId()) {
                $this->nextGameInRoundId++;
            }

            // If there is no next stage – set null
            $nextGameId = !$this->isGameInLastRound() ? $currentRoundMaxGames + $this->nextGameInRoundId : null;

            $this->games[] = [
                'id' => $currentGameId,
                'round' => $this->currentRoundId,
                'game_in_round' => $this->gameInCurrentRound,
                'next_game_id' => $nextGameId
            ];
        }
    }

    private function isNotLastRound(int $gamesInRound): bool
    {
        return $gamesInRound % 2 === 0;
    }

    private function getCurrentRoundMaxGames(): int
    {
        return $this->gamesInRounds[$this->currentRoundId] ?? 0;
    }

    private function shouldIncreaseNextGameInRoundId(): int
    {
        return $this->gameInCurrentRound % 2;
    }

    private function isGameInSameRound(): bool
    {
        return $this->gameInCurrentRound < $this->getCurrentRoundMaxGames();
    }

    private function resetGameInCurrentRound(): void
    {
        $this->gameInCurrentRound = 1;
    }

    private function resetNextGameInRoundId(): void
    {
        $this->nextGameInRoundId = 0;
    }

    private function isGameInLastRound(): bool
    {
        return $this->getCurrentRoundMaxGames() === 1;
    }
}
