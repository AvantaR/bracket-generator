<?php

namespace BracketGenerator\Types;

class SingleElimination implements Type
{
    private array $games = [];
    private int $currentRoundId = 1;
    private int $numberOfGames = 0;
    private array $gamesInRounds = [];
    private int $gameInCurrentRound = 0;
    private int $nextGameInRoundId = 0;

    public function generate(int $numberOfParticipants): array
    {
        $this->setNumberOfGames($numberOfParticipants);
        $this->setGamesQuantityInRounds($numberOfParticipants / 2);

        $this->iterateOverGames();

        return $this->games;
    }

    private function setGamesQuantityInRounds(int $gamesInRound): void
    {
        $this->gamesInRounds[] = $gamesInRound;

        if ($this->isNotLastRound($gamesInRound)) {
            $this->setGamesQuantityInRounds($gamesInRound / 2);
        }
    }

    private function setNumberOfGames(int $numberOfParticipants): void
    {
        $this->numberOfGames = $numberOfParticipants - 1;
    }

    /**
     * @param int $gamesInRound
     * @return bool
     */
    private function isNotLastRound(int $gamesInRound): bool
    {
        return $gamesInRound % 2 === 0;
    }

    /**
     * @return mixed
     */
    private function getCurrentRoundMaxGames()
    {
        return $this->gamesInRounds[$this->currentRoundId - 1];
    }

    /**
     * @return int
     */
    private function shouldIncreaseNextGameInRoundId(): int
    {
        return $this->gameInCurrentRound % 2;
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

    /**
     * @return bool
     */
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

    /**
     * @return bool
     */
    private function isGameInLastRound(): bool
    {
        return $this->getCurrentRoundMaxGames() === 1;
    }
}
