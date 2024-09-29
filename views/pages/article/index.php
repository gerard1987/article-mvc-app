<h1><?= ucfirst($title) ?></h1>

<p><a href="/articles/add">Add a article</a></p>

<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Price</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php foreach($content as $k => $v): ?>
        <tr>
            <td><?= $v->id ?></td>
            <td><?= $v->name ?></td>
            <td><?= $v->price ?></td>
            <td><a href="/articles/edit/<?= $v->id ?>">Edit</a></td>
            <td><a href="/articles/delete/<?= $v->id ?>">Delete</a></td>
        </tr>
    <?php endforeach; ?>
</table>

<p><strong><?= $message; ?></strong></p>