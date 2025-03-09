Test the API
I used Postman to test these API's

Register: POST /api/register

Login: POST /api/login

Create Task: POST /api/tasks

Get Tasks: GET /api/tasks

Update Task: PUT /api/tasks/{id}

Delete Task: DELETE /api/tasks/{id}


Admin 

![img.png](img.png) -> A user assigned a task to admin.

![img_1.png](img_1.png) -> Admin can edit and delete task created by users 

![img_2.png](img_2.png) -> Both user's and admin's can create task 


User

![img_3.png](img_3.png) -> Task created by user ,deleted by admin , only task created by admin now is visible to user

![img_4.png](img_4.png) -> User can edit or reply to the message 

![img_5.png](img_5.png) -> They can not delete task that is not created by him/her 
