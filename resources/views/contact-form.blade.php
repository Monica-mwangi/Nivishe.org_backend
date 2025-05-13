<!-- resources/views/contact-form.blade.php -->
<h2>New Contact Form Message</h2>

<p><strong>Name:</strong> {{ $data['Name'] }}</p>  <!-- PascalCase -->
<p><strong>Email:</strong> {{ $data['Email'] }}</p>
<p><strong>Message:</strong></p>
<p>{{ $data['Message'] }}</p>