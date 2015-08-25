<?php
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 24/08/15
 * Time: 20:25
 */

namespace CultuurNet\UitidCredentials\Command;

use CultuurNet\Auth\ConsumerCredentials;
use CultuurNet\UitidCredentials\UitidCredentialsFetcher;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GetAccessTokenCommand extends Command
{
    public function configure()
    {
        $this->setName('get-token')
            ->setDescription('Retrieve token information')
            ->addArgument(
                'token',
                InputArgument::REQUIRED,
                'The token key, use  if you do not have another one to test with.'
            );
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $consumerCredentials= new ConsumerCredentials(
            'd454b97f34c14dac0430ea1bd3f16d45',
            '5200e24446f960759c9d41f223321c63'
        );
        $fetcher = new UitidCredentialsFetcher('http://acc2.uitid.be/', $consumerCredentials, null);

        $tokenKey = $input->getArgument('token');
        $token = $fetcher->getAccessToken($tokenKey);

        $output->writeln('token: ' . $token->getToken());
        $output->writeln('token secret: ' . $token->getTokenSecret());
        $output->writeln('consumer key: ' . $token->getConsumer()->getKey());
        $output->writeln('consumer name: ' . $token->getConsumer()->getName());
        $output->writeln('consumer secret: ' . $token->getConsumer()->getSecret());
        $output->writeln('user uid: ' . $token->getUser()->getUid());
        $output->writeln('user nick: ' . $token->getUser()->getNick());
        $output->writeln('user email: ' . $token->getUser()->getEmail());
    }
}
