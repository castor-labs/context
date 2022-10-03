<?php

$header = <<<EOF
@project Castor Context
@link https://github.com/castor-labs/context
@project castor/context
@author Matias Navarro-Carter mnavarrocarter@gmail.com
@license MIT
@copyright 2022 Castor Labs Ltd

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.
EOF;

return (new PhpCsFixer\Config())
    ->setCacheFile('.castor/var/php-cs-fixer.cache')
    ->setRiskyAllowed(true)
    ->setRules([
        '@PhpCsFixer' => true,
        'declare_strict_types' => true,
        'header_comment' => ['header' => $header, 'comment_type' => 'PHPDoc'],
    ])
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->in(__DIR__)
            ->exclude('.php-cs-fixer.dist.php')
    );
