<!-- for creting unix timestamp for a particualr date -->
<?php
echo (mktime(0,0,0,12,31,2022) - mktime(0,0,0,12,16,2022))/86400;