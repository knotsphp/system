<?php

it('can execute', function () {
    exec('php cli/sysinfo.php', $output, $result_code);
    $output = implode(PHP_EOL, $output);
    echo $output;
    expect($result_code)->toBe(0)
        ->and($output)->toContain('> ');
});
