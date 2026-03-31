<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2 class="mb-4">Student Management System</h2>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <!-- Search Form -->
    <form method="get" action="/students" class="mb-3 d-flex gap-2">
        <input type="text" name="keyword" class="form-control w-25"
               placeholder="Search name, email, course..."
               value="<?= esc($keyword ?? '') ?>">
        <button type="submit" class="btn btn-primary">Search</button>
        <a href="/students" class="btn btn-secondary">Clear</a>
    </form>

    <a href="/students/create" class="btn btn-success mb-3">+ Add Student</a>

    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Course</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($students)): ?>
            <?php foreach ($students as $i => $student): ?>
            <tr>
                <td><?= $i + 1 ?></td>
                <td><?= esc($student['name']) ?></td>
                <td><?= esc($student['email']) ?></td>
                <td><?= esc($student['course']) ?></td>
                <td>
                    <a href="/students/edit/<?= $student['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="/students/delete/<?= $student['id'] ?>"
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Delete this student?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="5" class="text-center">No students found.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>

    <!-- Pagination -->
    <?php if (isset($pager) && $pager): ?>
        <div class="d-flex justify-content-center">
            <?= $pager->links() ?>
        </div>
    <?php endif; ?>
</div>
</body>
</html>