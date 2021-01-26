 JOB Seeker profile API Details

## Register an user call follwoing API

http://localhost/jobSeekerApi/public/api/register

## Login user call following API

http://localhost/jobSeekerApi/public/api/login


## Get seeker profile(USE GET Method) 

http://localhost/jobSeekerApi/public/api/jobProfile


## Serach jobseeker profiles(USE GET Method)

http://localhost/jobSeekerApi/public/api/jobProfile?search=

## Insert jon seeker profile data ( Use POST Method)

http://localhost/jobSeekerApi/public/api/jobProfile

parameters : image,name,location,email,mobile,description,title


## update  jon seeker profile data ( Use PUT Method)

http://localhost/jobSeekerApi/public/api/jobProfile/{id}

parameters : image,name,location,email,mobile,description,title



## DELETE job Seeker data (USE DELETE Method)

http://localhost/jobSeekerApi/public/api/jobProfile/{id}





##Files :- 

Route : routes/api.php

Controller : 1)API/jobSeekerController.php
			 2)API/AuthController.php

Model : 1)User model
		2)SeekerProfile


##Authentication Pacckage : 

PASSPORT

##DATABASE : 
db_name : jobseekers
table name : 

-------------------------------+
| attendance                    |
| employee                      |
| failed_jobs                   |
| migrations                    |
| oauth_access_tokens           |
| oauth_auth_codes              |
| oauth_clients                 |
| oauth_personal_access_clients |
| oauth_refresh_tokens          |
| password_resets               |
| seeker_profiles               |
| users




