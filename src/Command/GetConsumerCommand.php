<?php
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 24/08/15
 * Time: 16:34
 */

namespace CultuurNet\UitidCredentials\Command;

use CultuurNet\Auth\Command\Command;
use CultuurNet\UitidCredentials\UitidCredentialsFetcher;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class GetConsumerCommand extends Command
{

    public function configure()
    {
        $this->setName('get-consumer')
            ->setDescription('Retrieve consumer information')
            ->addArgument(
                'consumer',
                InputArgument::REQUIRED,
                'The consumer key to retrieve info about.'
            )
            ->addOption(
                'base-url',
                null,
                InputOption::VALUE_REQUIRED,
                'Base URL of the UiTiD service provider to authenticate with'
            );
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        parent::execute($input, $output);

        $baseUrl = $input->getOption('base-url');

        $consumerCredentials = $this->session->getConsumerCredentials();
        $fetcher = new UitidCredentialsFetcher($baseUrl, $consumerCredentials);

        $consumerKey = $input->getArgument('consumer');
        $consumer= $fetcher->getConsumer($consumerKey);

        $output->writeln('consumer key: ' . $consumer->getKey());
        $output->writeln('consumer name: ' . $consumer->getName());
        $output->writeln('consumer secret: ' . $consumer->getSecret());
    }
}
