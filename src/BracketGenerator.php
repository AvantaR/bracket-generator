<?php

namespace BracketGenerator;

class BracketGenerator
{
    public function generate(int $numberOfParticipants): array
    {
        $numberOfNodes = $numberOfParticipants - 1;
        $nodesInStage = $this->getNodesInStages($numberOfParticipants);

        $nodes = [];

        $currentStageId = 1;
        $nodesInCurrentStage = 0;
        $doubles = 0;
        $previousMaxNodes = $nodesInStage[$currentStageId - 1];

        for ($currentNodeNumber = 1; $currentNodeNumber <= $numberOfNodes; $currentNodeNumber++) {
            if ($nodesInCurrentStage < $nodesInStage[$currentStageId - 1]) { // Check if still in same stage
                $nodesInCurrentStage++;
            } else { // If next stage
                $currentStageId++;
                $previousMaxNodes += $nodesInStage[$currentStageId-1];
                $nodesInCurrentStage = 1;
                $doubles = 0;
            }

            // Skip matches
            if ($nodesInCurrentStage % 2) {
                $doubles++;
            }

            // If there is no next stage – set null
            $nextNode = $nodesInStage[$currentStageId-1] > 1 ? $previousMaxNodes + $doubles : null;

            $nodes[] = [
                'id' => $currentNodeNumber,
                'stage' => $currentStageId,
                'stage_node' => $nodesInCurrentStage,
                'next_node' => $nextNode
            ];
        }

        return $nodes;
    }

    private function getNodesInStages(int $numberOfParticipants, array $nodesInStage = []): array
    {
        if ($numberOfParticipants % 2 === 0) {
            $maxNodesInStage = $numberOfParticipants / 2;
            $nodesInStage[] = $maxNodesInStage;

            $nodesInStage = $this->getNodesInStages($maxNodesInStage, $nodesInStage);
        }

        return $nodesInStage;
    }
}
