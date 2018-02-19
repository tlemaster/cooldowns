<?php
/**
 * File UpdateGodCommand.php
 *
 * @package App\Command
 * @author  Todd LeMaster <tlemaste@nerdery.com>
 */

namespace App\Command;

use Exception;
use App\Service\DatabaseUpdateManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Console command class that update all Gods data to the database
 *
 * @package App\Command
 * @author  Todd LeMaster <tlemaste@nerdery.com>
 */
class UpdateGodsCommand extends Command
{
    /**
     * @var DatabaseUpdateManager
     */
    private $databaseUpdateManager;

    /**
     * UpdateGodsCommand constructor.
     *
     * @param DatabaseUpdateManager $databaseUpdateManager
     */
    public function __construct(DatabaseUpdateManager $databaseUpdateManager)
    {
        $this->databaseUpdateManager = $databaseUpdateManager;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('app:update-gods')
            ->setDescription('Updates all God data to database')
            ->setHelp('Command to update our database God data from HiRez API');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln(['==== Gods Update Started ====']);
        $results = false;

        try {
            $results = $this->databaseUpdateManager->updateGods();
        } catch (Exception $exception) {
            $output->writeln('Gods Update failed error:' . $exception->getMessage());
        }

        $output->writeln($results);

        $output->writeln(['==== Gods Update completed ====']);
    }
}
