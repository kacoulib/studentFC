<h2>Bio des étudiants</h2>

<?php foreach ($infos as $name => $bio) : ?>
    <li><?php echo $name; ?>
        <ul>
            <?php foreach ($bio as $value) : ?>
                <li><?php echo $value; ?></li>
            <?php endforeach; ?>
        </ul>
    </li>
<?php endforeach; ?>
