<x-admin.admin-layout>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">SKILL</h1>
            <a href="{{ route('admin.skills.create') }}" class="btn btn-primary mb-3">Add Skill</a>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Skill List
                </div>
                <div class="card-body">
                    <table class="table" id="myTabel">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($skills as $index => $skill)
                            <tr> 
                                <td scope="row">{{ $index + 1 }}</td>
                                <td>{{ $skill->title }}</td>
                                <td>{{ $skill->name }}</td>
                                <td>{{ $skill->description }}</td>
                                <td>
                                    <a href="{{ route('admin.skills.edit', $skill) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <button class="btn btn-danger btn-sm"
                                        onclick="showDeleteModal({{ $skill->id }})">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this skill?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <form id="deleteForm" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        @if(session('success'))
        Swal.fire({
            title: "Good Job!",
            text: "{{ session('success') }}",
            icon: "success",
            confirmButtonText: "OK"
        });
        @endif
    });

    function showDeleteModal(skillId) {
        const deleteForm = document.getElementById('deleteForm');
        deleteForm.action = `/admin/skills/${skillId}`;

        Swal.fire({
            title: "Are you sure?",
            text: "This action cannot be undone!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "Cancel"
        }).then((result) => {
            if (result.isConfirmed) {
                deleteForm.submit();
            }
        });
    }
    </script>
</x-admin.admin-layout>