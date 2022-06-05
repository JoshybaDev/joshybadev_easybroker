<?php
namespace JoshybaDev\EasyBroker;
function Version()
{
  return "1.0.0";
}
function UserAgent()
{
  return "EasyBroker-".Version();
}
function DefaultHeaders($ApiKey)
{
  return [
    'Content-Type: application/json',
    'Accept: application/json',
    'User-Agent: '. UserAgent(),
    'X-Authorization: '.$ApiKey
  ];
}
function DefaultAPIRootUrl($AppEnv)
{
  if($AppEnv=='production')
    return 'https://www.easybroker.com/api/v1';
  elseif($AppEnv=='local')
    return 'https://api.stagingeb.com/v1';
  else 
    return '';
}
function StagingAPIRootUrl($AppEnv)
{
  if($AppEnv=='production')
    return 'https://www.stagingeb.com/api/v1';
  elseif($AppEnv=='local')
    return 'https://api.stagingeb.com/v1';
  else 
    return '';  
}