## Konna 
Using this app we can login using default email and password
You can also use a google account, Mobile OTP will be other options for login.

I use Queue for huge no of email sending

Application has Role-based Access for authorization So we can create any kind of role with specific permission

Users can access the system based on assign Role


## Installation 

To Install Application 

First update .env files for configuring the database and email service(Use default Google mail service, we can use any Gmail credential for email)

Run folowing commend from root directory:

	composer update
	php artisan migrate (for migrate database)
	php artisan db:seed (for create Admin, User role and Admin User)
	php artisan serve (for run the app or you can use)

Now log in as Admin using 
Username: admin@user.com 
Password: 1234567890

Use queue for email service for run queue

	php artisan queue:work






