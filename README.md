# Templodocs

A sacred tool for documents templates. So far you can use it to:
* generate word document from tempo jira csv files

## Usage

Generate a Word document from a template. To generate the word document run following 
command.

Template file should have following keyword inside document: `${content}`.
It will be replaced on file generation with valid data templodocs tool.


```bash
bin/templodocs ./templates/data.csv ./templates/template.docx new_report en pl https://test-net.atlassian.net
```

## TODO 
* Add tempo reports api usage 
* Add `phpcs` and `phpstan` [x]
* Add php unit tests [x]
* Add translation api [x]
* Enhance command line with progress information 
* Enhance command line tool with named arguments and docs 
* Introduce AI based workflow for other similar tasks and summary 

