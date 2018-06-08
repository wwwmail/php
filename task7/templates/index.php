<html>
<head>
	<title>%TITLE%</title>
<link rel="stylesheet" href="templates/css/style.css">
</head>
<body>
<div><h2>Contact Form</h2></div>
<div style="color: #FF0000; font-size: 15px;"><strong>%ERRORS%</strong></div>

<div class="container">
  <form action="action_page.php">

    <label for="fname">Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name..">

    <label for="lname">Email</label>
    <input type="text" id="email" name="email" placeholder="your_email@mail.com">

    <label for="subject">Subject</label>
    <select id="subject" name="subject">
     <option >Select your subject</option>
      <option value="question">Question</option>
      <option value="offering">Offering</option>
      <option value="payment">Payment</option>
    </select>

    <label for="message">Message</label>
    <textarea id="message" name="message" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" value="Submit">

  </form>
</div>

</body>
</html>
