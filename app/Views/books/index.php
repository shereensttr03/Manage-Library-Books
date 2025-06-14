<h2>Books</h2>

<?php if (session()->getFlashdata('message')): ?>
    <p><?= session()->getFlashdata('message') ?></p>
<?php endif; ?>

<a href="/books/create">Add New Book</a>

<table border="1" cellpadding="10">
    <tr>
        <th>Title</th>
        <th>Author</th>
        <th>Genre</th>
        <th>Year</th>
        <th>Image</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($books as $book): ?>
        <tr>
            <td><?= esc($book['title']) ?></td>
            <td><?= esc($book['author']) ?></td>
            <td><?= esc($book['genre']) ?></td>
            <td><?= esc($book['year']) ?></td>
            <td><img src="/uploads/<?= esc($book['image']) ?>" width="50"></td>
            <td>
                <a href="/books/edit/<?= $book['id'] ?>">Edit</a> |
                <a href="/books/delete/<?= $book['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>