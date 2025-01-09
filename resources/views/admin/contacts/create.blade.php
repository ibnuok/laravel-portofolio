@extends('admin.index')

<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <div class="container-fluid px-4">
            <h1 class="text-center mb-4 fw-bold text-primary">CREATE CONTACT</h1>
            <div class="card shadow">
                <div class="card-body">
                    <form id="contactForm" action="{{ route('admin.contacts.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone:</label>
                            <input type="text" name="phone" id="phone" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message:</label>
                            <textarea name="message" id="message" class="form-control" rows="4" required></textarea>
                        </div>
                        <button type="submit" id="submitt" class="btn btn-primary w-100">Save Contact</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('submitt').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent form submission
        let form = document.getElementById('contactForm');
        let toast = new bootstrap.Toast(document.getElementById('successToast'));

        if (form.checkValidity()) {
            // If form is valid, show success alert
            Swal.fire({
                title: "Good job!",
                text: "Data skill berhasil ditambahkan",
                icon: "success"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Submit form if confirmed
                    // Display the toast notification
                    toast.show();
                }
            });
        } else {
            // If form is invalid, show error alert
            Swal.fire({
                title: "Error!",
                text: "Tolong isikan form dengan benar",
                icon: "error"
            });
        }
        form.classList.add('was-validated'); // Bootstrap validation styling
    });
</script>
