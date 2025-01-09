@extends('admin.index')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Data Certificate</h1>
                <a href="{{ route('admin.certificate.create') }}" class="btn btn-primary mt-4 mb-4">Add Certificate</a>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Skill List
                    </div>
                    <div class="card-body">
                        <table class="table" id="myTabel">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Issued By</th>
                                    <th scope="col">Issued At</th>
                                    <th scope="col">Descrition</th>
                                    <th scope="col">File</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($certificate as $index => $certificate)
                                <tr>
                                    <td scope="row">{{ $index + 1 }}</td>
                                    <td>{{ $certificate->name }}</td>
                                    <td>{{ $certificate->issued_by }}</td>
                                    <td>{{ $certificate->issued_at }}</td>
                                    <td>{{ $certificate->description }}</td>
                                    <td>
                                        @if($certificate->file)
                                            <a href="{{ asset('storage/' . $certificate->file) }}" class="btn btn-primary btn-sm" target="_blank">View File</a>
                                        @else
                                            No File uploaded
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.certificate.show', $certificate) }}" class="btn btn-info btn-sm">Detail</a>
                                        <a href="{{ route('admin.certificate.edit', $certificate) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('admin.certificate.destroy', $certificate) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this certificate?');">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>