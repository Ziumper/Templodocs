# Templodocs

A sacred tool for documents templates. So far you can use it to:
* generate word document from tempo csv files

## Usage

Generate a Word document from a template. To generate the word document run following 
command.

```bash
bin/templodocs ./templates/data.csv ./templates/template.docx new_report.docx
```

## TODO 
* Add tempo reports api usage 
* Add `phpcs` and `phpstan` [x]
* Add php unit tests 
* Add translation api

## Commands

```bash
# Unit Testing
vendor/bin/phpunit -c phpunit.xml.dist --display-deprecations --display-phpunit-deprecations

# PhpCsFixer
vendor /bin/php-cs-fixer fix --verbose src/ 
vendor /bin/php-cs-fixer fix --verbose tests/
    
# PhpStan
vendor/bin/phpstan analyze src/ tests/
  
# PhpCS
vendor/bin/phpcs src/ tests/   
```