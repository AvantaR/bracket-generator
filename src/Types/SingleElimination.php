<?php

namespace BracketGenerator\Types;

class SingleElimination implements Type
{
    public function generate(int $numberOfParticipants): array
    {
        $numberOfGames = $this->getNumberOfGames($numberOfParticipants);
        $gamesInRounds = $this->getGamesQuantityInRounds($numberOfParticipants);

        $games = [];

        $currentRoundId = 1;
        $gameInCurrentRound = 0;
        $doubles = 0;
        $previousMaxNodes = $gamesInRounds[$currentRoundId - 1];

        for ($currentGameId = 1; $currentGameId <= $numberOfGames; $currentGameId++) {
            if ($gameInCurrentRound < $gamesInRounds[$currentRoundId - 1]) { // Check if still in same stage
                $gameInCurrentRound++;
            } else { // If next stage
                $currentRoundId++;
                $previousMaxNodes += $gamesInRounds[$currentRoundId - 1];
                $gameInCurrentRound = 1;
                $doubles = 0;
            }

            // Skip matches
            if ($gameInCurrentRound % 2) {
                $doubles++;
            }

            // If there is no next stage – set null
            $nextGame = $gamesInRounds[$currentRoundId - 1] > 1 ? $previousMaxNodes + $doubles : null;

            $games[] = [
                'id' => $currentGameId,
                'round' => $currentRoundId,
                'game_in_round' => $gameInCurrentRound,
                'next_game' => $nextGame
            ];
        }

        return $games;
    }

    private function getGamesQuantityInRounds(int $numberOfParticipants, array $gamesQuantityInStages = []): array
    {
        if ($numberOfParticipants % 2 === 0) {
            $maxNodesInStage = $numberOfParticipants / 2;
            $gamesQuantityInStages[] = $maxNodesInStage;

            $gamesQuantityInStages = $this->getGamesQuantityInRounds($maxNodesInStage, $gamesQuantityInStages);
        }

        return $gamesQuantityInStages;
    }

    private function getNumberOfGames(int $numberOfParticipants): int
    {
        return $numberOfParticipants - 1;
    }
}
