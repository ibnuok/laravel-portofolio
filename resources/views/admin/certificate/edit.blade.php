@extends('admin.index')

<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <div class="container-fluid px-4">
            <h1>Edit Certificate</h1>
            
            <a href="{{ route('admin.certificate.index') }}" class="btn btn-secondary mb-3">Back to Certificates</a>
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.certificate.update', $certificate) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="name" class="form-label">Certificate Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $certificate->name) }}" required>
                </div>
                
                <div class="mb-3">
                    <label for="issued_by" class="form-label">Issued By</label>
                    <input type="text" name="issued_by" class="form-control" id="issued_by" value="{{ old('issued_by', $certificate->issued_by) }}" required>
                </div>
                
                <div class="mb-3">
                    <label for="issued_at" class="form-label">Issued At</label>
                    <input type="date" name="issued_at" class="form-control" id="issued_at" value="{{ old('issued_at', $certificate->issued_at) }}" required>
                </div>
                
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" class="form-control" id="description" rows="4" required>{{ old('description', $certificate->description) }}</textarea>
                </div>
                
                <div class="mb-3">
                    <label for="file" class="form-label">Certificate File (PDF)</label>
                    @if($certificate->file)
                        <p>Current File: <a href="{{ asset('storage/' . $certificate->file) }}" target="_blank">Download</a></p>
                    @endif
                    <input type="file" name="file" class="form-control" id="file" accept=".pdf">
                    <small class="text-muted">Leave blank if you don't want to change the file</small>
                </div>
                
                <button type="submit" class="btn btn-success">Update Certificate</button>
            </form>
        </div>
    </div>
</div>