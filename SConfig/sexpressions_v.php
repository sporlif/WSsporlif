<?php

/**
 * Description of sexpressions_v
 *
 * @author MAURICIO PINZÓN
 */

    define('/^([a-zA-Z]+)([a-zA-Z0-9\-\_\.]+)([a-zA-Z0-9]+)@([a-zA-Z0-9\-]+)((\.([a-z]){2,3})+)$/','EMAIL');
    define('/^([a-zA-Z0-9])*$/','TEXT');
    define('/^([0-9])*$/','NUMBER');
    define('/^([a-zA-Z])*$/','NAME');

?>
