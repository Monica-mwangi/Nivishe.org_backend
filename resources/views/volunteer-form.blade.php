<!DOCTYPE html>
<html>
<head>
    <title>New Volunteer Application</title>
</head>
<body>
    <h2>New Volunteer Application Received</h2>

    <p><strong>Name:</strong> {{ $data['name'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Phone:</strong> {{ $data['phone'] }}</p>
    <p><strong>Address:</strong> {{ $data['address'] ?? 'N/A' }}</p>
    <p><strong>Skills:</strong> {{ $data['skills'] }}</p>
    <p><strong>Availability:</strong> {{ $data['availability'] }}</p>
    <p><strong>Motivation:</strong> {{ $data['motivation'] }}</p>
    <p><strong>Experience:</strong> {{ $data['experience'] ?? 'N/A' }}</p>

    <p>Thank you.</p>
</body>
</html>
