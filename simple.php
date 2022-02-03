<?php
// notrycatch.php
declare(strict_types = 1);

class MyException extends Exception
{
}

class TryCatch
{
    public function test($param = null): string
    {
        if (null === $param) {
            throw new MyException('oeps, we have an error');
        }

        if ('Bart' === $param) {
            throw new MyException('Bart mag er niet in');
        }

        return $param;
    }
}

// controller -------------------------
$trigger = new TryCatch();

try {
    echo $trigger->test();
} catch (MyException $e) {
    echo $e->getMessage();
}

echo "\n" . 'code continues';