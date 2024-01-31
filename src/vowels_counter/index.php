<?php

function getCount($str)
{
  $vowelsCount = 0;
  $vowels = ['a', 'i', 'u', 'e', 'o'];
  $chars = str_split(strtolower($str));

  foreach ($chars as $char) {
    if (in_array($char, $vowels)) {
      $vowelsCount++;
    }
  }

  return $vowelsCount;
}

echo <<<'TITLE'
=========================================
|             Vowel Counter             |
=========================================
TITLE . "\n";

$retry = true;

while ($retry) {
  echo "input text\t: ";
  $text = fgets(STDIN);
  if ($text == '') {
    break;
  }
  echo "vowels count\t: " . getCount($text) . "\n";

  echo "=========================================\n";

  $restart = '';

  while (!in_array($restart, ['y', 'n'])) {
    echo "Do you want to restart ? (y/n): ";
    $restart = strtolower(trim(fgets(STDIN)));

    if ($restart === 'y') {
      $retry = true;
      echo "Alright, let's restart\n";
      echo "=========================================\n";
      break;
    } elseif ($restart === 'n') {
      $retry = false;
      echo "Okay, I'll exit now\n";
      echo "=========================================\n";
      break;
    } else {
      echo "Sorry, I didn't understand. Could you please try again?\n";
      echo "=========================================\n";
      continue;
    }
  }
}