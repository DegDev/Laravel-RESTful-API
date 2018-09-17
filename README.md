# Laravel-RESTful-API
<h1> Subject: Create an API which allow users and groups management </h1>
<h3> Out of scope: authentication, and roles management; forms and views </h3>

<h4> User Stories: </h4>
- I want to create a user who is included in a group
- I want to check if this user exits and is active
- I want to modify the list of users of a group

<h4>Entities:</h4>
- User: email, last name, first name, state (active/ non active), creation date
- Group: name

<h4>API methods:</h4>
- /users/ - fetch(retrieve) list of users
- /users/ - create a user
- /users/id/ - fetch info of a user
- /users/id/ - modify users info
- /groups/ - fetch list of groups
- /groups/ - create a group
- /groups/id/ - modify group info
 
<h4>Bonus:</h4>
- to perform a functional test
- add validation constraints/rules


