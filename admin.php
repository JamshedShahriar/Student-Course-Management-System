<?php
session_start();

// Check if logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: admin_login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="styles.css" />
  <title>Admin Dashboard | Student Course Management</title>
  <style>
    /* Reset */
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f3f6fb;
      color: #333;
    }

    header {
      background-color: #1a237e;
      color: white;
      padding: 20px 30px;
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.15);
      position: sticky;
      top: 0;
      z-index: 999;
    }

    header h1 {
      margin: 0;
      font-size: 1.8rem;
      font-weight: 700;
    }

    nav ul {
      list-style: none;
      display: flex;
      flex-wrap: wrap;
      gap: 15px;
      margin-top: 15px;
      padding-left: 0;
    }

    nav ul li a {
      color: #fff;
      text-decoration: none;
      padding: 8px 14px;
      border-radius: 6px;
      background: rgba(255, 255, 255, 0.1);
      transition: background 0.3s, color 0.3s;
      font-weight: 600;
    }

    nav ul li a:hover {
      background-color: #ffca28;
      color: #1a237e;
    }

    main {
      max-width: 960px;
      margin: 30px auto;
      padding: 0 20px;
    }

    section {
      background: #fff;
      padding: 25px 30px;
      margin-bottom: 30px;
      border-radius: 12px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    }

    section h2 {
      font-size: 1.5rem;
      margin-bottom: 20px;
      border-bottom: 2px solid #1a237e;
      padding-bottom: 8px;
      color: #1a237e;
    }

    form {
      display: grid;
      gap: 15px;
    }

    input[type="text"],
    input[type="email"],
    input[type="tel"],
    input[type="number"],
    input[type="date"],
    textarea {
      width: 100%;
      padding: 12px 14px;
      border: 1.5px solid #ccc;
      border-radius: 8px;
      font-size: 1rem;
      transition: border-color 0.3s ease;
      resize: vertical;
    }

    input:focus,
    textarea:focus {
      border-color: #1a73e8;
      outline: none;
      box-shadow: 0 0 0 2px rgba(26, 115, 232, 0.2);
    }

    button {
      background-color: #1a73e8;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 8px;
      font-weight: 600;
      font-size: 1rem;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #0f57c3;
    }

    @media (max-width: 600px) {
      nav ul {
        flex-direction: column;
        gap: 10px;
      }
      header {
        padding: 20px 15px;
      }
    }
  </style>
  
 <style> 
 /* Header Layout */
.nav-container {
  display: flex;
  flex-direction: column;
}

.main-nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
  margin-top: 15px;
}

/* Nav Lists */
.nav-left,
.nav-right {
  list-style: none;
  display: flex;
  gap: 15px;
  padding-left: 0;
  margin: 0;
}

/* Nav Links */
.nav-left a {
  color: #fff;
  text-decoration: none;
  padding: 8px 14px;
  border-radius: 6px;
  background: rgba(255, 255, 255, 0.1);
  transition: background 0.3s, color 0.3s;
  font-weight: 600;
}

.nav-left a:hover {
  background-color: #ffca28;
  color: #1a237e;
}

/* Buttons on Right */
.btn-link {
  padding: 8px 16px;
  background-color: #ffffff;
  color: #1a237e;
  font-weight: bold;
  border-radius: 6px;
  text-decoration: none;
  transition: background-color 0.3s ease, color 0.3s ease;
  border: 2px solid #ffffff;
}

.btn-link:hover {
  background-color: #ffca28;
  color: #1a237e;
}

.logout {
  background-color: #e53935;
  color: #fff;
  border-color: #e53935;
}

.logout:hover {
  background-color: #b71c1c;
  color: #fff;
}

 </style>
  
  
  
  
  
</head>
<body>

 <header>
  <div class="nav-container">
    <h1>Student Course Management</h1>
    <nav class="main-nav">
      <ul class="nav-left">
        <li><a href="php/admin-student.php">Students</a></li>
        <li><a href="php/admin-course.php">Courses</a></li>
        <li><a href="php/admin-instructor.php">Instructors</a></li>
        <li><a href="php/admin-course_instructor.php">Course Instructors</a></li>
        <li><a href="php/admin-enrollment.php">Enrollments</a></li>
      </ul>
      <ul class="nav-right">
        <li><a href="admin_change_password.php" class="btn-link">Change Password</a></li>
        <li><a href="admin_logout.php" class="btn-link logout">Logout</a></li>
      </ul>
    </nav>
  </div>
</header>


  <main>
    <!-- Students Section -->
    <section id="students">
      <h2>Add Student</h2>
      <form action="php/add_student.php" method="POST">
        <input type="text" name="name" placeholder="Name" required />
        <input type="email" name="email" placeholder="Email" required />
        <input type="tel" name="phone" placeholder="Phone" required />
        <input type="date" name="dob" required />
        <textarea name="address" placeholder="Address"></textarea>
        <button type="submit">Add Student</button>
      </form>
    </section>

    <!-- Courses Section -->
    <section id="courses">
      <h2>Add Course</h2>
      <form action="php/add_course.php" method="POST">
        <input type="text" name="courseName" placeholder="Course Name" required />
        <input type="number" name="credits" placeholder="Credits" required />
        <input type="text" name="department" placeholder="Department" required />
        <button type="submit">Add Course</button>
      </form>
    </section>

    <!-- Instructors Section -->
    <section id="instructors">
      <h2>Add Instructor</h2>
      <form action="php/add_instructor.php" method="POST">
        <input type="text" name="name" placeholder="Name" required />
        <input type="email" name="email" placeholder="Email" required />
        <input type="tel" name="phone" placeholder="Phone" required />
        <input type="text" name="department" placeholder="Department" required />
        <button type="submit">Add Instructor</button>
      </form>
    </section>

    <!-- Enrollments Section -->
    <section id="enrollments">
      <h2>Add Enrollment</h2>
      <form action="php/add_enrollment.php" method="POST">
        <input type="number" name="studentId" placeholder="Student ID" required />
        <input type="number" name="courseId" placeholder="Course ID" required />
        <input type="date" name="enrollmentDate" required />
        <input type="text" name="grade" placeholder="Grade" />
        <button type="submit">Add Enrollment</button>
      </form>
    </section>

    <!-- Course Instructors Section -->
    <section id="courseinstructors">
      <h2>Assign Course Instructor</h2>
      <form action="php/add_course_instructor.php" method="POST">
        <input type="number" name="courseId" placeholder="Course ID" required />
        <input type="number" name="instructorId" placeholder="Instructor ID" required />
        <input type="date" name="assignmentDate" required />
        <button type="submit">Assign Instructor</button>
      </form>
    </section>
  </main>

</body>
</html>
