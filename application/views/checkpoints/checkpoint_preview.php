<?php
$n = 1;
foreach ($checkpoints as $check) : ?>
    <tr>
        <td><?= $n++; ?></td>

        <td><?= indo_date($check['currentdatetime']); ?></td>
        <td><?= indo_time($check['currentdatetime']); ?></td>
        <td><?= $check['name']; ?></td>
        <td><?= $check['site']; ?></td>
        <td><?= $check['location']; ?></td>
        <td><?= $check['isclear']; ?></td>
        <td><?= $check['desc']; ?></td>
    </tr>
<?php endforeach ?>