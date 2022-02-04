<?php
$MODEL->Reset('msc_news');
$resultSet = $MODEL->Recent();
$badge_news = $resultSet ? count($resultSet):0;

$MODEL->Reset('msc_todo');
$resultSet = $MODEL->Recent();
$badge_todo = $resultSet ? count($resultSet):0;
?>
<nav>
<table class="menu">
<tr>
<td>
    <a href="index.php" title="News Updates" <?php echo isActive('index'); ?>>
        News <?php echo getNavBadge($badge_news); ?>
    </a>
</td>
<td>
    <a href="todo.php" title="Assignments" <?php echo isActive('todo'); ?>>
        Assignment <?php echo getNavBadge($badge_todo); ?>
    </a>
</td>             
<td>
    <a href="downloads.php" title="Download Files" <?php echo isActive('downloads'); ?>>
        Materials <?php echo getNavBadge(2); ?>
    </a>
</td>
<td>
    <a href="calendar.php" title="My Calendar" <?php echo isActive('calendar'); ?>>
        Time Table
    </a>
</td>           
<td>
    <a href="contacts.php" title="My Coursemates" <?php echo isActive('contacts'); ?>>
        Coursemates <var>37</var>
    </a>
</td>
</tr>
</table>
</nav>