
    <div class="container">
        <?php foreach ($data as $single) : ?>
            <div><a href="/students/<?= $single['student_id'] ?>"><?= $single['student_firstname'] ?></div>
        <?php endforeach; ?>
    </div>

