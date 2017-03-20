<?php

namespace SimpleSearch\Cli;

use SimpleSearch\Cli\Command\UserSearchCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Exception\LogicException;

/**
 * Cli application class. Update getCommands method when new command should be added
 */
class SimpleSearchCliApplication extends Application
{
    /**
     * {@inheritdoc}
     */
    public function __construct()
    {
        parent::__construct('CLI tool for simple search');

        $this->addCommands($this->getCommands());
    }

    /**
     * Get list of available CLI commands. Do not forget to register your command here when you add a new one.
     *
     * @return array
     */
    public function getCommands()
    {
        $commands = [];

        try {
            $commands[] = new UserSearchCommand();
        } catch (LogicException $e) {
            echo "Can't add 'search' command. {$e->getMessage()}\n";
        }

        return $commands;
    }
}
