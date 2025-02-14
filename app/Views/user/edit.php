<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white">
                        <h4 class="text-center mb-0">Update Profil</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('/user/update/' . $user['id']) ?>" method="post">
                            <input type="hidden" name="_method" value="POST">

                            <div class="mb-3">
                                <label class="form-label">Nama:</label>
                                <input type="text" name="name" class="form-control" value="<?= $user['name'] ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email:</label>
                                <input type="email" name="email" class="form-control" value="<?= $user['email'] ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password (Kosongkan jika tidak ada perubahan):</label>
                                <input type="password" name="password" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Job:</label>
                                <input type="text" name="job" value="<?= $user['job'] ?>" required><br>
                            </div>

                            <div class="mb-3">
                                <label>Department:</label>
                                <input type="text" name="department" value="<?= $user['department'] ?>" required><br>
                            </div>

                            <div class="mb-3">
                                <label>Salary:</label>
                                <input type="number" name="salary" step="0.01" value="<?= $user['salary'] ?>" required><br>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="<?= base_url('/user') ?>" class="btn btn-secondary mt-2">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>