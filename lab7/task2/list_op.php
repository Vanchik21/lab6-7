<div>
    <h1>List: </h1>
    <ul>
        <?php
        /** @var array $menu_items */
        foreach ($menu_items as $item): ?>
            <li><?php echo "ID" . $item['id']; ?>. <?php echo "<br>" . $item['item']; ?></li>
        <?php endforeach; ?>
    </ul>
</div>
