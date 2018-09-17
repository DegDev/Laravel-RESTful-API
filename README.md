# Laravel-RESTful-API
<h2> Subject: Create an API which allow users and groups management </h2>
<h3> Out of scope: authentication, and roles management; forms and views </h3>

<h4> User Stories: </h4>
<ul>
    <li> I want to create a user who is included in a group</li>
    <li> I want to check if this user exits and is active </li>
    <li> I want to modify the list of users of a group </li>
</ul>

<h4>Entities:</h4>
- User: email, last name, first name, state (active/ non active), creation date <br>
- Group: name

<h4>API methods:</h4>
- /users/ - fetch(retrieve) list of users <br>
- /users/ - create a user <br>
- /users/id/ - fetch info of a user <br>
- /users/id/ - modify users info <br>
- /groups/ - fetch list of groups <br>
- /groups/ - create a group <br>
- /groups/id/ - modify group info <br>
 
<h4>Bonus:</h4>
- to perform a functional test
- add validation constraints/rules


