<?php

namespace DNSSync\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;
use DNSSync\Application\DNSSynchronizer;
use DNSSync\Exception\DNSSyncException;
use DNSSync\Application\Adapters\BestHostingPTRAdapter;
use DNSSync\Application\Adapters\BestHostingDNSRecordsAdapter;
use DNSSync\Commands\ConfigCommand;
use DNSSync\Application\FileBuilder;
use DNSSync\Application\Logger\OutputInterfaceLogger;

class PTRSyncCommand extends ConfigCommand {

    protected function configure(){   
        $this->setName("dns-sync:ptr")
             ->setDescription("Sync PTR records to tmp directory")
//              ->setDefinition(array(
//                       new InputOption('start', 's', InputOption::VALUE_OPTIONAL, 'Start number of the range of Fibonacci number', $start),
//                       new InputOption('stop', 'e', InputOption::VALUE_OPTIONAL, 'stop number of the range of Fibonacci number', $stop)
//                 ))
             ->setHelp("Automatic PTR synchronization");
    }

    protected function execute(InputInterface $input, OutputInterface $output){
//         $move = $input->getOption('move');
//         $stop  = intval($input->getOption('stop'));
//		try{
			$outputInterfaceLogger = new OutputInterfaceLogger($output);
			$dnsSynchronizer = new DNSSynchronizer($this->config);
			$dnsSynchronizer->setLogger($outputInterfaceLogger);
			$ptrDataAdapter = $this->config["data-adapter.ptr-records"];
			$dnsSynchronizer->createPTRRecords(new $ptrDataAdapter($this->config));
			
//		}catch (DNSSyncException $e){
//         	echo $e->getMessage();
//         }catch (Exception $e){
//         	echo $e->getMessage();
//         }

// 		if($move){
			
// 		}
// 		$fileBuilder = new FileBuilder($this->config);
		//přesun nových záznamů
// 		$fileBuilder->clearDirectory($this->config['path-ptr-backup']);
// 		$fileBuilder->moveDirectory($this->config['path-ptr'], $this->config['path-ptr-backup']);
// 		$fileBuilder->moveDirectory($this->config['path-ptr-tmp'], $this->config['path-ptr']);
			
		//přesun seznamu zónových souborů
// 		$fileBuilder->saveContent($ptrBuilder->getZoneList(), $this->config['path-zones-ptr-tmp']);
// 		$fileBuilder->moveFile($this->config['path-zones-ptr'], $this->config['path-zones-ptr-backup']);
// 		$fileBuilder->moveFile($this->config['path-zones-ptr-tmp'], $this->config['path-zones-ptr']);
		
        $output->writeln('PTR records has been synchronized.');
    }
}
