<!DOCTYPE html>
<html>
<head>
    <title>Admission Preview PDF</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        .container { padding: 20px; }
        h2 { margin-bottom: 20px; }
        p { margin: 5px 0; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Admission Details</h2>
        <p><strong>Name:</strong> {{ $admission->first_name }} {{ $admission->last_name }}</p>
        <p><strong>Email:</strong> {{ $admission->email }}</p>
        <p><strong>Phone:</strong> {{ $admission->phone }}</p>
        <p><strong>Address:</strong> {{ $admission->address }}</p>
        <p><strong>Date of Birth:</strong> {{ $admission->dob }}</p>
        <p><strong>Gender:</strong> {{ $admission->gender }}</p>
        <p><strong>High School Percentage:</strong> {{ $admission->highschool }}</p>
        <p><strong>Intermediate Percentage:</strong> {{ $admission->intermediate }}</p>
        <p><strong>Board:</strong> {{ $admission->board }}</p>
        <p><strong>Department:</strong> {{ $admission->department }}</p>
        <p><strong>Course:</strong> {{ $admission->course }}</p>
    </div>
</body>
</html>
