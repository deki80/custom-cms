
<div class="container">
    <h2>Students List</h2>
    <p>Select student to edit grades</p>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Index No.</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data as $student): extract($student)?>
        <tr>
            <td><?= $student_firstname; ?></td>
            <td><?= $student_lastname; ?></td>
            <td><?= $student_indexnomber; ?></td>
            <td><a href="/students/edit/<?= $student_id ?>" class="btn btn-primary">Edit</a></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

