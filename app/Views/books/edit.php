<h2>Edit Book</h2>

<?php if (isset($validation)): ?>
    <?= $validation->listErrors() ?>
<?php endif; ?>

<form action="/books/update/<?= $book['id'] ?>" method="post" enctype="multipart/form-data">
    <input type="text" name="title" value="<?= esc($book['title']) ?>" placeholder="Title"><br>
    <input type="text" name="author" value="<?= esc($book['author']) ?>" placeholder="Author"><br>
    <input type="text" name="genre" value="<?= esc($book['genre']) ?>" placeholder="Genre"><br>
    <input type="number" name="year" value="<?= esc($book['year']) ?>" placeholder="Year"><br>
    <input type="file" name="image"><br>
    <img src="/uploads/<?= esc($book['image']) ?>" width="80"><br>
    <button type="submit">Update</button>
</form>