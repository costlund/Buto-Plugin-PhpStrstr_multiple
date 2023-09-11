<?php
class PluginPhpStrstr_multiple{
  public $separator = ' ';
  public $match_all = false;
  public function search($haystack, $needle){
    $haystack = mb_strtolower($haystack);
    wfPlugin::includeonce('string/array');
    $string_array = new PluginStringArray();
    if(!$needle){
      $needle = array();
    }
    if(!is_array($needle)){
      $needle = $string_array->from_char($needle, $this->separator);
    }
    if(!$this->match_all){
      $match = false;
      foreach($needle as $v){
        $v = strtolower($v);
        if(wfPhpfunc::strstr($haystack, $v)){
          $match = true;
          break;
        }
      }
    }else{
      $match = true;
      foreach($needle as $v){
        $v = strtolower($v);
        if(!wfPhpfunc::strstr($haystack, $v)){
          $match = false;
          break;
        }
      }
    }
    return $match;
  }
}