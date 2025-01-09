@extends ('admin.index')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <div class="container-fluid px-4">
            <div class="container-fluid px-4">
                <h1>Add New Certificate</h1>
                <a href="{{ route('admin.certificate.index') }}" class="btn btn-secondary mb-3">Back</a>
                <form action="{{ route('admin.certificate.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
                    </div>
                    <div class="mb-3">
                        <label for="issued_by" class="form-label">Issued By</label>
                        <input type="text" class="form-control" id="issued_by" name="issued_by" placeholder="Enter issuer" required>
                    </div>
                    <div class="mb-3">
                        <label for="issued_at" class="form-label">Issued At</label>
                        <input type="date" class="form-control" id="issued_at" name="issued_at" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">Upload Certificate File</label>
                        <input type="file" class="form-control" id="file" name="file">
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>