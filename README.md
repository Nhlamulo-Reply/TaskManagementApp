# TaskManagementApp

📌 Task Management System - Laravel Breeze

Welcome to the Task Management System, a simple yet powerful web application built with Laravel 12.
This system allows users to create, assign, manage, and track tasks with ease. 
It also includes role-based authentication to differentiate between Admins and Users.

⸻

📖 Table of Contents
	1.	Features
	2.	User Roles & Permissions
	3.	Installation Guide
	4.	Environment Configuration
	5.	Docker Setup
	6.	Available Routes
	7.	Packages Used
	8.	Testing
	

⸻

🎯 Features

✅ User Authentication (Login, Register, Logout)
✅ Admin Dashboard for managing all tasks & users
✅ Task CRUD Operations (Create, View, Update, Delete)
✅ Task Assignment & Email Notifications
✅ Task Filters & Search (By status, due date, keywords)
✅ Role-Based Access Control (Admin vs. User)
✅ Real-time Email Notifications via Mailpit
✅ RESTful API for Task Management

⸻

👥 User Roles & Permissions

This system has two types of users:

1️⃣ Admin
	•	Can manage all users & tasks
	•	Can assign tasks to users
	•	Can delete tasks
	•	Can filter and search tasks
	•	Can view task activity logs

2️⃣ Regular User
	•	Can create, edit, and delete their own tasks
	•	Can view tasks assigned to them
	•	Can filter and search their own tasks

Method
Route
Description
GET
/register
User Registration
GET
/login
User Login
POST
/logout
User Logout

Method
Route
Description
GET
/tasks
View all tasks
GET
/tasks/create
Create new task form
POST
/tasks
Store new task
GET
/tasks/{id}/edit
Edit a task
PUT
/tasks/{id}
Update task details
DELETE
/tasks/{id}
Delete a task




