<?php
namespace Manuglopez\LaravelGitGuardianShield\Commands;


use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class ScanRepoCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scan:repo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scan Laravel Repo For Secrets Leeks';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $process =  Process::fromShellCommandline('ggshield secret scan repo .');
        ray($process->run());
        ray($process->getOutput());
        $this->info($process->getOutput());
        return 0;
    }
}
