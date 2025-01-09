@extends('admin.index')

<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <div class="container-fluid px-4">
            <h1>Certificate Details</h1>
            
            <a href="{{ route('admin.certificate.index') }}" class="btn btn-secondary mb-3">Back to Certificates</a>
            
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Certificate: {{ $certificate->name }}</h5>
                    
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <strong>Issued By:</strong> {{ $certificate->issued_by }}
                        </li>
                        <li class="list-group-item">
                            <strong>Issued At:</strong> {{ \Carbon\Carbon::parse($certificate->issued_at)->format('d M Y') }}
                        </li>
                        <li class="list-group-item">
                            <strong>Description:</strong>
                            <p>{{ $certificate->description }}</p>
                        </li>
                        <li class="list-group-item">
                            <strong>File:</strong> 
                            @if($certificate->file)
                                <a href="{{ asset('storage/' . $certificate->file) }}" target="_blank">Download File</a>
                            @else
                                No File Uploaded
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>