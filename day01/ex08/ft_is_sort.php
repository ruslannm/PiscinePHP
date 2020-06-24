<?php
function ft_is_sort($tab)
{
    $tab_sort = $tab;
    sort($tab_sort);
    if ($tab_sort == $tab)
        return (true);
    else
        return (false);
}
?>
