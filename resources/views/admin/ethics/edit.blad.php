
<!DOCTYPE html>
<html>
<head>
    <title>Edit Notification</title>
</head>
<body>
    <h1>Edit Notification</h1>
    <form action="{{ route('notifications.update', $notification->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="title">Title</label>
        <input type="text" name="title" value="{{ $notification->title }}" required>

        <label for="scroller_icon">Scroller Icon</label>
        <input type="text" name="scroller_icon" value="{{ $notification->scroller_icon }}">

        <label for="scroller_link">Scroller Link</label>
        <input type="url" name="scroller_link" value="{{ $notification->scroller_link }}">

        <label for="guideline_document">Guideline Document</label>
        <input type="file" name="guideline_document">

        <label for="description">Description</label>
        <textarea name="description" required>{{ $notification->description }}</textarea>

        <label for="contact_description">Contact Description</label>
        <textarea name="contact_description" required>{{ $notification->contact_description }}</textarea>

        <label for="email">Email</label>
        <input type="email" name="email" value="{{ $notification->email }}" required>

        <button type="submit">Update Notification</button>
    </form>
</body>
</html>
