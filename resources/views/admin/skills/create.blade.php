<x-admin.admin-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Button Back -->
                <h1 class="text-center mb-4 fw-bold text-primary">SKILL </h1>
                <div class="d-flex justify-content-start mb-4">
                    <a href="{{ route('admin.skills.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </div>
                <!-- Form Card -->
                <div class="card shadow">
                    <div class="card-body">
                        <form action="{{ route('admin.skills.store') }}" method="POST" class="row">
                            @csrf

                            <!-- Left Column: Input Fields -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title:</label>
                                    <input 
                                        type="text" 
                                        name="title" 
                                        id="title" 
                                        class="form-control" 
                                        placeholder="Enter skill title" 
                                        required
                                    >
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name:</label>
                                    <input 
                                        type="text" 
                                        name="name" 
                                        id="name" 
                                        class="form-control" 
                                        placeholder="Enter your name" 
                                        required
                                    >
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description:</label>
                                    <textarea 
                                        name="description" 
                                        id="description" 
                                        class="form-control" 
                                        rows="3" 
                                        placeholder="Describe the skill" 
                                        required
                                    ></textarea>
                                </div>
                            </div>

                            <!-- Right Column: Image -->
                            <div class="col-md-6 d-flex justify-content-center align-items-center">
                                <img 
                                    src="{{ asset('assets/image.png') }}" 
                                    alt="Skill Illustration" 
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