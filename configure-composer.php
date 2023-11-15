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

// copy dev namespaces
foreach ($bundleComposerData['autoload-dev']['psr-4'] as $namespace => $path) {
    $appComposerData['autoload-dev']['psr-4'][$namespace] = './bundle/' . $path;
}