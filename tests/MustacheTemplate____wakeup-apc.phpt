--TEST--
MustacheTemplate::__wakeup() member function with APC
--SKIPIF--
<?php 
if( !extension_loaded('mustache') ) die('skip ');
if( !extension_loaded('apc') ) {
  die('skip ' . "try running with: make test TEST_PHP_ARGS='-d extension=/usr/lib/php5/20090626/apc.so -d apc.enable_cli=1'");
}
?>
--FILE--
<?php
ini_set('apc.enable_cli', 1);
$m = new Mustache();
$tmpl = new MustacheTemplate('{{test}}');
$ret = apc_store(md5(__FILE__), serialize($tmpl));
$tmpl = unserialize(apc_fetch(md5(__FILE__)));
var_dump($tmpl);
var_dump($tmpl->__toString());
var_dump($m->render($tmpl, array('test' => 'baz')));
?>
--EXPECT--
object(MustacheTemplate)#3 (1) {
  ["template"]=>
  string(8) "{{test}}"
}
string(8) "{{test}}"
string(3) "baz"