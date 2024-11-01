
<!DOCTYPE html>
<html>
<head>
    <title>Show Notification</title>
</head>
<body>
    <h1>{{ $notification->title }}</h1>
    <p>{{ $notification->description }}</p>
    <p><strong>Contact Description:</strong> {{ $notification->contact_description }}</p>
    <p><strong>Email:</strong> {{ $notification->email }}</p>
    <a href="{{ route('notifications.index') }}">Back to Notifications</a>
</body>
</html>
