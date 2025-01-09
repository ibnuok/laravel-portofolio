@extends('index')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>
    <ul>
        <li><a href="{{ route('admin.contacts.index') }}">Manage Contacts</a></li>
        <!-- Tambahkan link ke fitur lain yang ingin ditampilkan di dashboard admin -->
        <li><a href="{{ route('admin.other_feature.index') }}">Other Feature</a></li> <!-- Contoh fitur lain -->
    </ul>
</div>
@endsection
