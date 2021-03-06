<?php
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 24/08/15
 * Time: 20:25
 */

namespace CultuurNet\UitidCredentials\Command;

use CultuurNet\Auth\Command\Command;
use CultuurNet\UitidCredentials\UitidCredentialsFetcher;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
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
                'The user access token to retrieve info about.'
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

        $baseUrl = $this->resolveBaseUrl('auth', $input);

        $consumerCredentials = $this->session->getConsumerCredentials();
        $fetcher = new UitidCredentialsFetcher($baseUrl, $consumerCredentials);

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
