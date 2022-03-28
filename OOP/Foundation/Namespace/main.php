<?php
namespace Astronomy;

use Astronomy\Planet\Planet;

include "earth.php";
include "planet.php";

$fp = new \Astronomy\Planet\Planet();
$fp->getName();
$earth =  new \Astronomy\Planet\Earth();
$earth->getName();