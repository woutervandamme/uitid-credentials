<?php
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 24/08/15
 * Time: 16:34
 */

namespace CultuurNet\UitidCredentials\Command;

use CultuurNet\Auth\ConsumerCredentials;
use CultuurNet\UitidCredentials\UitidCredentialsFetcher;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GetConsumerCommand extends Command
{

    public function configure()
    {
        $this->setName('get-consumer')
            ->setDescription('Retrieve consumer information.')
            ->addArgument(
                'consumer',
                InputArgument::REQUIRED,
                'The consumer key, use d454b97f34c14dac0430ea1bd3f16d45 if you do not have another one to test with.'
            );
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $consumerCredentials= new ConsumerCredentials(
            'd454b97f34c14dac0430ea1bd3f16d45',
            '5200e24446f960759c9d41f223321c63'
        );
        $fetcher = new UitidCredentialsFetcher('http://acc2.uitid.be/', $consumerCredentials, null);

        $consumerKey = $input->getArgument('consumer');
        $consumer= $fetcher->getConsumer($consumerKey);

        $output->writeln('consumer key: ' . $consumer->getKey());
        $output->writeln('consumer name: ' . $consumer->getName());
        $output->writeln('consumer secret: ' . $consumer->getSecret());
    }
}
