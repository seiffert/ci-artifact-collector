<?php

namespace Seiffert\CiCollectorBundle\Command;

use Doctrine\ORM\EntityManager;
use Seiffert\CiCollectorBundle\Entity\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RegisterApplicationCommand extends Command
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->entityManager = $em;

        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('ci:application:register')
            ->setAliases(array('ci:register:app'))
            ->addArgument('name', InputArgument::REQUIRED);
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument('name');

        $output->writeln('Registering appliction ' . $name . '...');

        $application = new Application();
        $application->setName($name);

        $this->entityManager->persist($application);
        $this->entityManager->flush($application);

        $output->writeln('<info>Successfully registered application ' . $name . '.</info>');
        $output->writeln('<info>Token: ' . $application->getPassword() . '</info>');

        return 0;
    }
}
