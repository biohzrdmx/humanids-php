<?php

declare(strict_types = 1);

/**
 * Humanids
 * Human-readable identifier generation
 * @author  biohzrdmx <github.com/biohzrdmx>
 * @license MIT
 */

namespace Humanids\Tokens;

class AnimalToken extends AbstractWordToken {

    /**
     * Plural flag
     */
    protected bool $plural;

    /**
     * @inheritdoc
     */
    protected array $words = [ // @phpstan-ignore-line
        ['ape', 'apes'],
        ['baboon', 'baboons'],
        ['badger', 'badgers'],
        ['bat', 'bats'],
        ['bear', 'bears'],
        ['bird', 'birds'],
        ['bobcat', 'bobcats'],
        ['bulldog', 'bulldogs'],
        ['bullfrog', 'bullfrogs'],
        ['cat', 'cats'],
        ['catfish', 'catfishes'],
        ['cheetah', 'cheetahs'],
        ['chicken', 'chickens'],
        ['chipmunk', 'chipmunks'],
        ['cobra', 'cobras'],
        ['cougar', 'cougars'],
        ['cow', 'cows'],
        ['crab', 'crabs'],
        ['deer', 'deers'],
        ['dingo', 'dingos'],
        ['dodo', 'dodos'],
        ['dog', 'dogs'],
        ['dolphin', 'dolphins'],
        ['donkey', 'donkeys'],
        ['dragon', 'dragons'],
        ['dragonfly', 'dragonflies'],
        ['duck', 'ducks'],
        ['eagle', 'eagles'],
        ['earwig', 'earwigs'],
        ['eel', 'eels'],
        ['elephant', 'elephants'],
        ['emu', 'emus'],
        ['falcon', 'falcons'],
        ['fireant', 'fireants'],
        ['firefox', 'firefoxes'],
        ['fish', 'fishes'],
        ['fly', 'flies'],
        ['fox', 'foxes'],
        ['frog', 'frogs'],
        ['gecko', 'geckos'],
        ['goat', 'goats'],
        ['goose', 'gooses'],
        ['grasshopper', 'grasshoppers'],
        ['horse', 'horses'],
        ['hound', 'hounds'],
        ['husky', 'huskys'],
        ['impala', 'impalas'],
        ['insect', 'insects'],
        ['jellyfish', 'jellyfishes'],
        ['kangaroo', 'kangaroos'],
        ['ladybug', 'ladybugs'],
        ['liger', 'ligers'],
        ['lion', 'lions'],
        ['lionfish', 'lionfishes'],
        ['lizard', 'lizards'],
        ['mayfly', 'mayflies'],
        ['mole', 'moles'],
        ['monkey', 'monkeys'],
        ['moose', 'mooses'],
        ['moth', 'moths'],
        ['mouse', 'mouses'],
        ['mule', 'mules'],
        ['newt', 'newts'],
        ['octopus', 'octopi'],
        ['otter', 'otters'],
        ['owl', 'owls'],
        ['panda', 'pandas'],
        ['panther', 'panthers'],
        ['parrot', 'parrots'],
        ['penguin', 'penguins'],
        ['pig', 'pigs'],
        ['puma', 'pumas'],
        ['pug', 'pugs'],
        ['quail', 'quails'],
        ['rabbit', 'rabbits'],
        ['rat', 'rats'],
        ['rattlesnake', 'rattlesnakes'],
        ['robin', 'robins'],
        ['seahorse', 'seahorses'],
        ['sheep', 'sheeps'],
        ['shrimp', 'shrimps'],
        ['skunk', 'skunks'],
        ['sloth', 'sloths'],
        ['snail', 'snails'],
        ['snake', 'snakes'],
        ['squid', 'squids'],
        ['starfish', 'starfishes'],
        ['stingray', 'stingrays'],
        ['swan', 'swans'],
        ['termite', 'termites'],
        ['tiger', 'tigers'],
        ['treefrog', 'treefrogs'],
        ['turkey', 'turkeys'],
        ['turtle', 'turtles'],
        ['vampirebat', 'vampirebats'],
        ['walrus', 'walruses'],
        ['warthog', 'warthogs'],
        ['wasp', 'wasps'],
        ['wolverine', 'wolverines'],
        ['wombat', 'wombats'],
        ['yak', 'yaks'],
        ['zebra', 'zebras'],
    ];

    /**
     * Constructor
     * @param bool  $plural Whether to use plurar or singular animal names
     * @param array $words  Words array
     */
    public function __construct(bool $plural = false, array $words = []) {
        parent::__construct($words);
        $this->plural = $plural;
    }

    /**
     * @inheritdoc
     */
    public function random(): string {
        $index = random_int(0, count($this->words) - 1); // @phpstan-ignore-line
        return $this->words[$index][$this->plural ? 1 : 0];
    }
}
