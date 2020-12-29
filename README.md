# bracket-generator

Simple Bracket Generator

[![](https://github.com/avantar/bracket-generator/workflows/build/badge.svg)](https://github.com/AvantaR/bracket-generator/actions)
[![codecov](https://codecov.io/gh/AvantaR/bracket-generator/branch/main/graph/badge.svg?token=PADMJWGQCK)](https://codecov.io/gh/AvantaR/bracket-generator)
[![Maintainability](https://api.codeclimate.com/v1/badges/93c4f57cd09db3c92c5f/maintainability)](https://codeclimate.com/github/AvantaR/bracket-generator/maintainability)

### Requirements:

1. PHP 7.4+

### How to use:

1. Create new instance of the Bracket Generator:

```php
$generator = new \BracketGenerator\Generator();
```

2. Use the ```generate``` method to get array with bracket games. You need to pass the number of tournament
   participants:

```php
$generator->generate(8);
```

3. You should get an array of games:

```php
[
    [
        'id' => 1,
        'round' => 1,
        'game_in_round' => 1,
        'next_game_id' => 5
    ],
    [
        'id' => 2,
        'round' => 1,
        'game_in_round' => 2,
        'next_game_id' => 5
    ],
    [
        'id' => 3,
        'round' => 1,
        'game_in_round' => 3,
        'next_game_id' => 6
    ],
    [
        'id' => 4,
        'round' => 1,
        'game_in_round' => 4,
        'next_game_id' => 6
    ],
    [
        'id' => 5,
        'round' => 2,
        'game_in_round' => 1,
        'next_game_id' => 7
    ],
    [
        'id' => 6,
        'round' => 2,
        'game_in_round' => 2,
        'next_game_id' => 7
    ],
    [
        'id' => 7,
        'round' => 3,
        'game_in_round' => 1,
        'next_game_id' => null
    ],
];
```

For now, the library is able to generate only a single elimination bracket. Feel free to contribute. Thanks!
