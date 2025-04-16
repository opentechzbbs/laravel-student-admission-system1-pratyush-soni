<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Admission Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5 mb-5">
        <h2 class="mb-4 text-center">College Admission Form</h2>
        <form action="#" method="POST" enctype="multipart/form-data">
            <!-- Personal Details -->
            <div class="card p-4 mb-4">
                <h5 class="mb-3">Personal Details</h5>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" id="first_name" name="first_name" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" id="last_name" name="last_name" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="dob" class="form-label">Date of Birth</label>
                    <input type="date" id="dob" name="dob" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label d-block">Gender</label>
                    <div class="form-check form-check-inline">
                        <input type="radio" id="male" name="gender" value="Male" class="form-check-input" required>
                        <label for="male" class="form-check-label">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" id="female" name="gender" value="Female" class="form-check-input">
                        <label for="female" class="form-check-label">Female</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" id="other" name="gender" value="Other" class="form-check-input">
                        <label for="other" class="form-check-label">Other</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="tel" id="phone" name="phone" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Permanent Address</label>
                    <textarea id="address" name="address" rows="3" class="form-control" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label">Upload Photo</label>
                    <input type="file" id="photo" name="photo" class="form-control" accept="image/*" required>
                </div>
            </div>

            <!-- Academic Details -->
            <div class="card p-4 mb-4">
                <h5 class="mb-3">Academic Information</h5>
                <div class="mb-3">
                    <label for="highschool" class="form-label">High School (10th) Percentage</label>
                    <input type="text" id="highschool" name="highschool" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="intermediate" class="form-label">Intermediate (12th) Percentage</label>
                    <input type="text" id="intermediate" name="intermediate" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="board" class="form-label">Board Name (12th)</label>
                    <input type="text" id="board" name="board" class="form-control" required>
                </div>
            </div>

            <!-- Course Selection -->
            <div class="card p-4 mb-4">
                <h5 class="mb-3">Course Selection</h5>
                <div class="mb-3">
                    <label for="department" class="form-label">Department</label>
                    <select id="department" name="department" class="form-select" required>
                        <option value="" disabled selected>Select Department</option>
                        <option value="Science">Science</option>
                        <option value="Commerce">Commerce</option>
                        <option value="Arts">Arts</option>
                        <option value="Engineering">Engineering</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="course" class="form-label">Course</label>
                    <select id="course" name="course" class="form-select" required>
                        <option value="" disabled selected>Select Course</option>
                        <option value="B.Sc">B.Sc</option>
                        <option value="B.Com">B.Com</option>
                        <option value="B.A">B.A</option>
                        <option value="B.Tech">B.Tech</option>
                    </select>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit Application</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
