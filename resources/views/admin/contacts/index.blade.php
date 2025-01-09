<x-admin.admin-layout>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Contacts</h1>
        <a href="{{ route('admin.contacts.create') }}" class="btn btn-primary mb-3">Add Contact</a>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Contacts List
            </div>
            <div class="card-body">
                <table class="table" id="myTabel">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Alamat</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $index => $contact)
                        <tr>
                            <td scope="row">{{ $index + 1 }}</td>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->phone }}</td>
                            <td>{{ $contact->message }}</td>
                            <td>
                                <a href="{{ route('admin.contacts.edit', $contact) }}"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin.admin-layout>