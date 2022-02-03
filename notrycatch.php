<?php
// notrycatch.php
declare(strict_types = 1);

class NoTryCatch
{
    public function test($param = null): ?string
    {
        if (null === $param) {
            return null;
        }

        return $param;
    }
}

$trigger = new NoTryCatch();
$test = $trigger->test();

echo  $test ?? 'oeps, we have an error';

echo "\n" . 'code continues';
