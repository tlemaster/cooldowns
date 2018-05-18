<?php
/**
 * File UpdateItemsCommand.php
 *
 * @package App\Command
 * @author Todd LeMaster <tlemaste@nerdery.com>
 */

namespace App\Command;

use Exception;
use App\Service\DatabaseUpdateManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Console command class that update all Items data to the database
 *
 * @package App\Command
 * @author Todd LeMaster <tlemaste@nerdery.com>
 */
class UpdateItemsCommand
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

    /**
     * @inheritdoc
     */
    protected function configure()
    {
        $this
            ->setName('app:update-items')
            ->setDescription('Updates all Item data to database')
            ->setHelp('Command to update our database Item data from HiRez API');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln(['==== Items Update Started ====']);
        $results = false;

        try {
            $results = $this->databaseUpdateManager->updateItems();
        } catch (Exception $exception) {
            $output->writeln('Items Update failed error:' . $exception->getMessage());
        }

        $this->outputResults($results, $output);

        $output->writeln(['==== Items Update completed ====']);
    }

    public function outputResults(array $results, OutputInterface $output)
    {
        foreach ($results as $result) {
            if (is_array($result)) {
                foreach ($result as $detailedResult) {
                    $output->writeln($detailedResult);
                }
                continue;
            };

            $output->writeln($result);
        }
    }
}
