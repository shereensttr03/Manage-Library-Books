<h2>Add Book</h2>

<?php if (isset($validation)): ?>
    <?= $validation->listErrors() ?>
<?php endif; ?>

<form action="/books/store" method="post" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Title"><br>
    <input type="text" name="author" placeholder="Author"><br>
    <input type="text" name="genre" placeholder="Genre"><br>
    <input type="number" name="year" placeholder="Year"><br>
    <input type="file" name="image"><br>
    <button type="submit">Save</button>
</form>