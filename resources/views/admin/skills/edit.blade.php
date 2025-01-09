<x-admin.admin-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <h1 class="text-center mb-4 fw-bold text-primary">Edit Skill</h1>
                <div class="d-flex justify-content-start mb-4">
                    <a href="{{ route('admin.skills.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </div>
                <div class="card shadow-lg">
                    <div class="card-body p-4">
                        <form action="{{ route('admin.skills.update', $skill) }}" method="POST" class="row">
                            @csrf
                            @method('PUT')

                            <!-- Left Section: Form Inputs -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label fw-semibold">Title:</label>
                                    <input 
                                        type="text" 
                                        name="title" 
                                        id="title" 
                                        class="form-control" 
                                        value="{{ $skill->title }}" 
                                        required
                                    >
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-semibold">Name:</label>
                                    <input 
                                        type="text" 
                                        name="name" 
                                        id="name" 
                                        class="form-control" 
                                        value="{{ $skill->name }}" 
                                        required
                                    >
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label fw-semibold">Description:</label>
                                    <textarea 
                                        name="description" 
                                        id="description" 
                                        class="form-control" 
                                        rows="5" 
                                        required
                                    >{{ $skill->description }}</textarea>
                                </div>
                            </div>

                            <!-- Right Section: Image -->
                            <div class="col-md-6 d-flex justify-content-center align-items-center">
                                <img 
                                    src="{{ asset('assets/image.png') }}" 
                                    alt="Edit Skill Illustration" 
                                    style="max-height: 300px; width: 100%; object-fit: cover;"
                                >
                            </div>

                            <!-- Submit Button -->
                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-primary w-100 fw-bold">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin.admin-layout>