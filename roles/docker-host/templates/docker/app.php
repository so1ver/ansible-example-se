<?php
/**
 * Created by IntelliJ IDEA.
 * User: so1ver
 * Date: 24.02.19
 * Time: 14:12
 */

echo '<table> <head><title>Container characteristics</title></head>'
    . '<caption>Container characteristics</caption>'
    . '<tr><td>Total disk space</td><td>' . disk_total_space('/') . '</td></tr>'
    . '<tr><td>Total core numbers</td><td>' . intval(shell_exec('cat /proc/cpuinfo | grep processor | wc -l')) . '</td></tr>'
    . '<tr><td>Total memory space</td><td>' . intval(shell_exec("cat /proc/meminfo | grep MemTotal | grep -Eo '[0-9]*'")) . '</td></tr>'
    . '</table>';
