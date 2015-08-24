#!/usr/bin/env php
<?php
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 24/08/15
 * Time: 16:23
 */

use CultuurNet\UitidCredentials\Command\GetConsumerCommand;
use Symfony\Component\Console\Application;

require 'vendor/autoload.php';

$app= new Application();

$app->add(new GetConsumerCommand());

$app->run();
