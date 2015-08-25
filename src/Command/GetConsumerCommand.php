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
            );
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        parent::execute($input, $output);
        $consumerCredentials = $this->session->getConsumerCredentials();
        $fetcher = new UitidCredentialsFetcher('http://acc2.uitid.be/', $consumerCredentials);

        $consumerKey = $input->getArgument('consumer');
        $consumer= $fetcher->getConsumer($consumerKey);

        $output->writeln('consumer key: ' . $consumer->getKey());
        $output->writeln('consumer name: ' . $consumer->getName());
        $output->writeln('consumer secret: ' . $consumer->getSecret());
    }
}
