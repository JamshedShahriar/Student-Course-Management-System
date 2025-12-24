<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student Course Management</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    :root {
      --primary-color: #4A90E2;
      --header-bg: #003366;
      --button-color: #4CAF50;
      --button-hover: #388E3C;
      --card-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      --transition-fast: 0.3s;
    }

    body {
      font-family: Arial, sans-serif;
      margin: 0;
      background-color: #f4f6f8;
    }

    header {
      background-color: var(--header-bg);
      color: white;
      padding: 1rem 2rem;
    }

    header h1 {
      margin: 0 0 0.5rem;
    }

    nav ul {
      list-style: none;
      padding: 0;
      display: flex;
      gap: 1rem;
    }

    nav ul li {
      display: inline;
    }

    nav a {
      color: white;
      text-decoration: none;
      font-weight: bold;
      padding: 0.4rem 0.8rem;
      border-radius: 4px;
      transition: background-color var(--transition-fast);
    }

    nav a:hover {
      background-color: rgba(255, 255, 255, 0.2);
    }

    .hero {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      padding: 4rem 1rem;
      background: linear-gradient(to right, var(--primary-color), var(--header-bg));
      color: #fff;
    }

    .hero h1 {
      font-size: 3rem;
      margin-bottom: 1rem;
    }

    .hero p {
      font-size: 1.2rem;
      max-width: 600px;
    }

    .quick-links {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 2rem;
      margin: 3rem auto;
      max-width: 1000px;
      padding: 0 1rem;
    }

    .card {
      background: #ccccccbd;
      padding: 2rem;
      text-align: center;
      border-radius: 12px;
      box-shadow: var(--card-shadow);
      transition: transform var(--transition-fast);
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .card h3 {
      margin-bottom: 1rem;
      color: var(--primary-color);
    }

    .card a {
      display: inline-block;
      margin-top: 1rem;
      padding: 0.6rem 1.2rem;
      background: var(--button-color);
      color: #fff;
      text-decoration: none;
      border-radius: 6px;
      transition: background-color var(--transition-fast);
    }

    .card a:hover {
      background-color: var(--button-hover);
    }
	

  </style>
</head>
<body>

<header>
  <h1>Student Course System</h1>
  <nav>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="students.php">Students</a></li>
      <li><a href="courses.php">Courses</a></li>
      <li><a href="instructors.php">Instructors</a></li>
      <li><a href="course_instructors.php">Course Instructor</a></li>
	  <li><a href="enrollment.php">Enrollments</a></li>
    </ul>
  </nav>
</header>

<section class="hero">
  <h1>Welcome to Student Course Portal</h1>
  <p>Manage students, courses, instructors, and enrollments in a simple and user-friendly interface.</p>
</section>

<main>
  <section>
    <h2>Quick Links</h2>
    <div class="quick-links">
      <div class="card">
        <h3>Manage Students</h3>
        <p>View all Student records.</p>
        <a href="students.php">View Students</a>
      </div>
      <div class="card">
        <h3>Manage Courses</h3>
        <p>Browse available courses</p>
        <a href="courses.php">View Courses</a>
      </div>
      <div class="card">
        <h3>Manage Instructors</h3>
        <p>Assign course instructors.</p>
        <a href="instructors.php">View Instructors</a>
      </div>
      <div class="card">
        <h3>Assign Course Instructors</h3>
        <p>Link instructors to their respective courses.</p>
        <a href="course_instructors.php">View Assign Courses</a>
      </div>
	  <div class="card-container">
	   <div class="card">
        <h3>Manage Enrollments</h3>
        <p>Enroll students into courses and manage their grades.</p>
        <a href="enrollment.php">Manage Enrollments</a>
      </div>
	 </div>
    </div>
  </section>
</main>

</body>
</html>
