<?php
$appComposerData = json_decode(file_get_contents(__DIR__ . '/composer.json'), true);
$bundleComposerData = json_decode(file_get_contents(__DIR__ . '/bundle/composer.json'), true);

// setup bundle as repository
$appComposerData['repositories']['bundle'] = [
    'type' => 'path',
    'url' => './bundle',
    'options' => [
        'symlink' => true
    ]
];

// remove require-dev, if empty
if (empty($appComposerData['require-dev'])) {
    unset($appComposerData['require-dev']);
}

// copy dev namespaces
foreach ($bundleComposerData['autoload-dev']['psr-4'] as $namespace => $path) {
    $appComposerData['autoload-dev']['psr-4'][$namespace] = './bundle/' . $path;
    echo sprintf('added %s: %s to autoload-dev%s', $namespace, './bundle/' . $path, PHP_EOL);
}

file_put_contents(__DIR__ . '/composer.json', json_encode($appComposerData, JSON_UNESCAPED_SLASHES));