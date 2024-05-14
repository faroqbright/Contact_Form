<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Contact us</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" />
   <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>

<body>

   <div class="card mx-auto w-50 mt-2">
      <div class="card-header">
         <h2>Contact Us</h2>
      </div>
      <div class="card-body">
         <form id="contactForm">
            <div class="form-group">
               <label for="name">Name</label>
               <input type="text" name="name" id="name" class="form-control">
               <p class="text-danger"></p>
            </div>
            <div class="form-group">
               <label for="email">Email</label>
               <input type="email" name="email" id="email" class="form-control">
               <p class="text-danger"></p>
            </div>
            <div class="form-group">
               <label for="phone">Phone</label>
               <input type="text" name="phone" id="phone" class="form-control">
               <p class="text-danger"></p>
            </div>
            <div class="form-group">
               <label for="subject">Subject</label>
               <input type="text" name="subject" id="subject" class="form-control">
               <p class="text-danger"></p>
            </div>
            <div class="form-group">
               <label for="message">message</label>
               <textarea type="text" name="message" id="message" class="form-control"></textarea>
               <p class="text-danger"></p>
            </div>

            <div class="form-group">
               <div class="g-recaptcha" id="reCAPTCHA" data-sitekey="6Lel4Z4UAAAAAOa8LO1Q9mqKRUiMYl_00o5mXJrR"></div>
               <p class="text-danger"></p>
            </div>


            <button class="btn btn-primary mt-2" type="button" id="submit">Submit</button>
         </form>
      </div>
   </div>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"></script>

   <script>
      $('#submit').on('click', function() {
         let data = $('#contactForm').serialize();
         $.ajax({
            url: 'contact.php',
            method: 'POST',
            data: data,
            success: function(res) {
               response = JSON.parse(res)
               console.log(res);
               $('.text-danger').text('')
               if (response.code == 400) {
                  response.errors.forEach(item => {
                     $(`#${item.field}`).closest('.form-group').find('.text-danger').text(item.error)
                  });
               }
               if (response.code == 200) {
                  alert('Contact Mail send!')
               }
            }
         })
      })
   </script>
</body>

</html>