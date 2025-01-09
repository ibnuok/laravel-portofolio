@extends('admin.index')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <div class="container-fluid px-4">
            <h1 class="text-center mb-4 fw-bold text-primary">EDIT CONTACT</h1>
            <form action="{{ route('admin.contacts.update', $contact) }}" method="POST">
                @csrf
                @method('PUT')
                <div>
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $contact->name }}" required>
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $contact->email }}" required>
                </div>
                <div>
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{ $contact->phone }}">
                </div>
                <div>
                    <label for="message">Message</label>
                    <textarea name="message" class="form-control" required>{{ $contact->message }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Update</button>
            </form>
        </div>
    </div>
</div>

