<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4" style="max-width: 500px;">
    <h2 class="mb-4">Edit Student</h2>

    <form method="post" action="/students/update/<?= $student['id'] ?>">
        <?= csrf_field() ?>
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control"
                   value="<?= esc($student['name']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control"
                   value="<?= esc($student['email']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Course</label>
            <input type="text" name="course" class="form-control"
                   value="<?= esc($student['course']) ?>" required>
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
        <a href="/students" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>