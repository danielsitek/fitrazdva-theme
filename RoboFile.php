<?php

class RoboFile extends \Robo\Tasks
{

    /** Run initialization task */
    public function init() {

        $this->sniffRegStandarts();
    }

    /** Test files with Codesniffer */
    public function sniffTest()
    {
        $this->taskExec('./bin/phpcs')
            ->args('-p -s -v -n')
            ->args('--colors')
            ->args('./theme-content')
            ->args('--standard=codesniffer.ruleset.xml')
            ->args('--extensions=php')
            ->run();
    }

    /** Fix automaticly repairable errors and warnings */
    public function sniffFix()
    {
        $this->taskExec('./bin/phpcbf')
            ->args('-p -s -v -n')
            ->args('--colors')
            ->args('./theme-content')
            ->args('--standard=codesniffer.ruleset.xml')
            ->args('--extensions=php')
            ->run();
    }

    /** Register WP coding standarts to codesniffer */
    private function sniffRegStandarts()
    {
        $this->taskExec('./bin/phpcs')
            ->args('--config-set')
            ->args('installed_paths')
            ->args('../../wp-coding-standards/wpcs')
            ->run();
    }
}
