<!DOCTYPE html>
<html>
<head>
    <title>New Partnership Application</title>
</head>
<body>
    <h2>New Partnership Form Submission</h2>

    <p><strong>Organization:</strong> {{ $data['organization'] }}</p>
    <p><strong>Contact Person:</strong> {{ $data['contactPerson'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Phone:</strong> {{ $data['phone'] }}</p>
    <p><strong>Website:</strong> {{ $data['website'] ?? 'N/A' }}</p>
    <p><strong>Type of Partnership:</strong> {{ $data['partnershipType'] }}</p>
    <p><strong>Organization Type:</strong> {{ $data['organizationType'] }}</p>
    <p><strong>Mission Alignment:</strong> {{ $data['missionAlignment'] }}</p>
    <p><strong>Resources Offered:</strong> {{ $data['resourcesOffered'] }}</p>
    <p><strong>Expectations:</strong> {{ $data['expectations'] }}</p>
    <p><strong>Previous Partnerships:</strong> {{ $data['previousPartnerships'] ?? 'None' }}</p>

    <p>-- End of submission --</p>
</body>
</html>
