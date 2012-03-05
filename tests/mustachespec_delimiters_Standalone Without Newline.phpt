--TEST--
Standalone Without Newline
--DESCRIPTION--
Standalone tags should not require a newline to follow them.
--SKIPIF--
<?php if(!extension_loaded('mustache')) die('skip '); ?>
--FILE--
<?php
$test = array (
  'name' => 'Standalone Without Newline',
  'data' => 
  array (
  ),
  'expected' => '=
',
  'template' => '=
  {{=@ @=}}',
  'desc' => 'Standalone tags should not require a newline to follow them.',
);
$mustache = new Mustache();
echo $mustache->render($test["template"], $test["data"]);
?>
--EXPECTREGEX--
\=\s+