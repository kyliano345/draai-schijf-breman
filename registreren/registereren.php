<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Animated Login From</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <link rel="stylesheet" href="CSS/index.css" />
  </head>
  <body>
  
  <div class="background-image" style="background-image: url('IMG/background6.jpg')"></div>
    <div class="login_form_container">
      <div class="login_form">
        <h2>Registreren</h2>
        <div class="input_group">
          <i class="fa fa-user"></i>
          <input
            type="text"
            placeholder="Username"
            class="input_text"
            autocomplete="off"
          />
        </div>
        <div class="input_group">
          <i class="fa fa-unlock-alt"></i>
          <input
            type="password"
            placeholder="Password"
            class="input_text"
            autocomplete="off"
          />
        </div>
        <div class="input_group">
            <i class="fa fa-unlock-alt"></i>
            <input
              type="email"
              placeholder="Email"
              class="input_text"
              autocomplete="off"
            />
          </div>
          <div class="input_group">
            <i class="fa fa-unlock-alt"></i>
            <input
              type="text"
              placeholder="Postcode"
              class="input_text"
              autocomplete="off"
            />
          </div>
          <div id="login_button">
  <input type="submit" value="Submit">
</div>
        <div class="fotter">
        </div>
      </div>
    </div>

    
    <script src="registeren.js"></script>
  </body>
</html>