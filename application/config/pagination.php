<?php

    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';
    if (count($_GET) > 0) $config['suffix'] = '?' . http_build_query($_GET, '', "&");
?>
