<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    .form-container {
  max-width: 500px;
  margin: 0 auto;
}

.form-step {
  display: none;
}

.step1 {
  display: block;
}

.next-button,
.prev-button {
  padding: 10px;
  margin-top: 20px;
  border: none;
  border-radius: 5px;
  background-color: #007bff;
  color: #fff;
  cursor: pointer;
}

.submit-button {
  padding: 10px;
  margin-top: 20px;
  border: none;
  border-radius: 5px;
  background-color: #28a745;
  color: #fff;
  cursor: pointer;
}

.next-button:hover,
.prev-button:hover,
.submit-button:hover {
  background-color: #0069d9;
}

.progress-bar {
  margin-top: 20px;
  height: 10px;
  background-color: #f0f0f0;
  border-radius: 5px;
  position: relative;
  overflow: hidden;
}

.progress {
  height: 100%;
  background-color: #007bff;
  border-radius: 5px;
  transition: width 0.5s ease-in-out;
  position: absolute;
  top: 0;
  left: 0;
  animation: progress-animation 3s infinite;
}

@keyframes progress-animation {
  0% {
    width: 0%;
  }
  50% {
    width: 50%;
  }
  100% {
    width: 100%;
  }
}

.step1 ~ .progress-bar .progress {
  width: 33.33%;
}

.step2 ~ .progress-bar .progress {
  width: 66.66%;
}

.step3 ~ .progress-bar .progress {
  width: 100%;
}

label {
  display: block;
  margin-top: 20px;
  font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="password"] {
  padding: 10px;
  width: 100%;
  border: none;
  border-radius: 5px;
  background-color: #f0f0f0;
  margin-top: 5px;
}

ul {
  list-style: none;
  margin-top: 20px;
  padding: 0;
}

ul li {
  margin-bottom: 10px;
}

ul li strong {
  display: inline-block;
  width: 100px;
}

#confirm-name,
#confirm-email,
#confirm-username,
#confirm-password {
  font-weight: bold;
}

.step1,
.step2,
.step3 {
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.step1 h2,
.step2 h2,
.step3 h2 {
  margin-top: 0;
}

.step1 button.next-button,
.step2 button.prev-button,
.step2 button.next-button,
.step3 button.prev-button {
  display: none;
}

.step2 button.prev-button,
.step3 button.submit-button {
  float: left;
}

.step3 button.prev-button {
  margin-right: 10px;
}

@media screen and (max-width: 480px) {
  input[type="text"],
  input[type="email"],
  input[type="password"] {
    width: 100%;
  }
}

</style>

<body>
<div class="form-container">
  <form>
    <div class="form-step step1">
      <h2>Step 1: Personal Information</h2>
      <label for="name">Name:</label>
      <input type="text" id="name" name="name">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email">
      <button class="next-button">Next</button>
    </div>
    <div class="form-step step2">
      <h2>Step 2: Account Information</h2>
      <label for="username">Username:</label>
      <input type="text" id="username" name="username">
      <label for="password">Password:</label>
      <input type="password" id="password" name="password">
      <button class="prev-button">Previous</button>
      <button class="next-button">Next</button>
    </div>
    <div class="form-step step3">
      <h2>Step 3: Confirm Information</h2>
      <p>Please review your information:</p>
      <ul>
        <li><strong>Name:</strong> <span id="confirm-name"></span></li>
        <li><strong>Email:</strong> <span id="confirm-email"></span></li>
        <li><strong>Username:</strong> <span id="confirm-username"></span></li>
        <li><strong>Password:</strong> <span id="confirm-password"></span></li>
      </ul>
      <button class="prev-button">Previous</button>
      <button class="submit-button">Submit</button>
    </div>
  </form>
  <div class="progress-bar">
    <div class="progress"></div>
  </div>
</div>

</body>
</html>