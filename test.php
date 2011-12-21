<?php

require 'docblock-parser.php';
main();

function main()
{
  // Define and get a list of all our test functions
  $fnsAll = get_defined_functions();
  tests();
  $fnsTest = get_defined_functions();
  $fnsTest = array_diff($fnsTest['user'], $fnsAll['user']);

  // Dump
  var_dump(array_combine(
    $fnsTest,
    array_map(
      array('DocBlock', 'ofFunction'),
      $fnsTest
    )
  ));
}

function tests()
{
  function a() {}
  /**
   * The B function
   * @return
   * @return bool
   * @return bool Whether or not something is true
   */
  function b() {}
  /**
   * @param
   * @param String
   * @param String $var
   * @param String $var
   *        Here's a wee description about the variable.
   *        Grand.
   */
  function c() {}
  /**
   * This is a multiline description.
   * 
   * These are often used when the developer wants to go into slightly more
   * detail into how a method functions in particular circumstances or elaborate
   * on a particular outcome of calling this function.
   * 
   * @author Paul Scott <paul@duedil.com>
   */
  function d() {}
}
