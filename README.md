# Build Symfony Bundle Action

This actions creates a blank Symfony project, installs the bundle in a `bundle` subdirectory and installs it with
Composer to run its tests in a real application.

## Usage

```yaml
- uses: ebitkov/build-symfony-bundle@v1
  with:
    # Whether to run the tests with PHPUnit
    # Default: true
    run-tests: ''

    # PHP version to use.
    # Default: 8.2
    php-version:

    # PHP extensions to install.
    # String in CSV format.
    # Default: 'mbstring, xml, ctype, iconv, intl, pdo, pdo_mysql, dom, filter, gd, json'
    php-extensions: ''

    # Additional options passed to Composer on installation.
    # --no-interaction --no-progress --ansi are added automatically.
    # Default: '--prefer-dist'
    composer-options: ''

    # Additional Composer dependencies to install.
    # Runs after the main installation.
    # Accepts flex aliases and full package names with version constraints.
    # Multiple dependencies can be defined as space-separated (e.g. 'twig symfony/doctrine-bundle')
    # Default: null
    composer-additional-dependencies: ''

    # Symfony version to use.
    # Default: 6.3
    symfony-version: ''

    # Repository to install as a bundle.
    # Mainly used internally for testing.
    # Default: ${{ github.repository }}
    repository: ''

    # Bundle name as a Composer dependency: {vendor}/{package}.
    # Useful, if your package name differs from your repository path.
    # Mainly used internally for testing.
    # Default: ${{ github.repository }}
    bundle-name:
```