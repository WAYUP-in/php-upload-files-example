<h2>Загрузка одного файла (jpeg, png)</h2>
<form action="actions/upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="image">
    <button type="submit">Upload</button>
</form>
<h2>Загрузка нескольких файлов</h2>
<form action="actions/multi-upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="images[]" multiple>
    <button type="submit">Upload</button>
</form>

<div style="display:flex;">
    <?php
    foreach (glob("uploads/*") as $item) {
        ?>
        <form action="actions/delete-file.php" style="margin: 10px; display:flex; flex-direction: column; width: 100px;" method="post">
            <img style="width: 100px" src="<?= $item ?>">
            <input type="hidden" name="file_path" value="<?= $item ?>">
            <button type="submit">Delete</button>
        </form>
        <?php
    }
    ?>
</div>