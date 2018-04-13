<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-size: 1.2em;
  background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url(index.jpg) center no-repeat fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -ms-background-size: cover;
  background-size: cover;
}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

h2,label {
    color: white;
}
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}
body {
     margin: 0;
     padding: 0;
     text-align: center;
}

.container {
    padding: 16px;
	width: 400px;
    margin: 0 auto;
	text-align: left;
}

form.container {border-style: solid;}
span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
<script>
function confirmInput() {
    fname = document.forms[0].fname.value;
    alert("Hello " + fname + "! WELCOME TO AHAGURU");
}
</script>
</head>
<body>
<div>
<center><br><br>
<h2>Login Form</h2>
<form role="form" method="post" action="validate_login.php" onSubmit="confirmInput()" class="container">

    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="email" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
        
    <button type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked"> Remember me
    </label>

</form>
</center>
</div>
</body>
</html>
