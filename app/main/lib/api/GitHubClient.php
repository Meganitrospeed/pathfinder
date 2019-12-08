<?php
/**
 * Created by PhpStorm.
 * User: Exodus 4D
 * Date: 29.01.2019
 * Time: 22:23
 */

namespace lib\api;

use lib\Config;
use Exodus4D\ESI\Client\ApiInterface;
use Exodus4D\ESI\Client\GitHub\GitHub as Client;
use Exodus4D\ESI\Client\GitHub\GitHubInterface as ClientInterface;

/**
 * Class GitHubClient
 * @package lib\api
 *
 * @method ClientInterface getProjectReleases(string $projectName, int $count) : array
 * @method ClientInterface markdownToHtml(string $context, string $markdown) : string
 */
class GitHubClient extends AbstractClient {

    /**
     * @var string
     */
    const CLIENT_NAME = 'gitHubClient';

    /**
     * @param \Base $f3
     * @return ApiInterface|null
     */
    protected function getClient(\Base $f3) : ?ApiInterface {
        $client = null;
        if(class_exists(Client::class)){
            $client = new Client(Config::getPathfinderData('api.git_hub'));
        }else{
            $this->getLogger()->write($this->getMissingClassError(Client::class));
        }

        return $client;
    }
}