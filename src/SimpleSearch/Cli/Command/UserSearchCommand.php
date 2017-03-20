<?php

namespace SimpleSearch\Cli\Command;

use SimpleSearch\Search\Handler\UserSearchHandler;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class UserSearchCommand extends Command
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        try {
            $this->setName('search-user');
        } catch (InvalidArgumentException $e) {
            echo "Can't set 'search-user' command name.\n";

            return;
        }

        $this
            ->setDescription('Search an user.')
            ->setHelp('This command allows you to search an user.')
            ->addArgument(UserSearchHandler::ARGUMENT_LAST_NAME, InputArgument::OPTIONAL, 'Last name of user.')
            ->addOption(
                UserSearchHandler::OPTION_FORMAT,
                null,
                InputOption::VALUE_OPTIONAL,
                'Input/output format (html/json)'
            );
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $arguments = [];
        $options = [];

        try {
            $arguments[UserSearchHandler::ARGUMENT_LAST_NAME] = (string)$input->getArgument(
                UserSearchHandler::ARGUMENT_LAST_NAME
            );
        } catch (InvalidArgumentException $e) {
            $arguments[UserSearchHandler::ARGUMENT_LAST_NAME] = '';
        }

        try {
            $options[UserSearchHandler::OPTION_FORMAT] = (string)$input->getOption(UserSearchHandler::OPTION_FORMAT);
        } catch (InvalidArgumentException $e) {
            $options[UserSearchHandler::OPTION_FORMAT] = '';
        }

        $searchHandler = new UserSearchHandler($arguments, $options);

        $output->writeln($searchHandler->getResponse());
    }
}
