<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Contact</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="users/css/animate.css">

    <link rel="stylesheet" href="users/css/owl.carousel.min.css">
    <link rel="stylesheet" href="users/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="users/css/magnific-popup.css">

    <link rel="stylesheet" href="users/css/flaticon.css">
    <link rel="stylesheet" href="users/css/style.css">
    {{-- fontawesome cdn --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
<style>
    /* Contact Section Styles */
    .contact-section {
        padding: 50px 0;
        background-color: #f9f9f9;
    }

    @media (max-width: 991.98px) {
        .ftco-navbar-light .navbar-brand {
            color: #dcc15a;
        }

        .ftco-navbar-light .navbar-nav>.nav-item>.nav-link {
            color: rgb(0 0 0 / 70%);

        }
    }

    /* Enhanced Heading Styles */
    .contact-section h2 {
        font-family: 'Poppins', sans-serif;
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 30px;
        text-align: center;
        color: #333;
        letter-spacing: 1px;
    }

    /* Form Control Enhancements */
    .form-control {
        border: 2px solid #ddd;
        border-radius: 10px;
        padding: 20px;
        font-size: 1.1rem;
        height: auto;
        /* Ensures larger height */
    }

    .form-group {
        margin-bottom: 20px;
        font-family: 'Times New Roman', Times, serif;
        color: black;
    }

    /* Submit Button Styles */
    .btn-primary {
        background-color: #ffcc33;
        border-color: #ffcc33;
        font-size: 1.2rem;
        padding: 15px 30px;
        border-radius: 30px;
        transition: background-color 0.3s, transform 0.2s;
    }

    .btn-primary:hover {
        background-color: #ffb800;
        transform: scale(1.05);
    }

    /* Ensure both form and image containers match in height */
    .form-container {
        height: 100%;
    }

    .contact-section .row {
        min-height: 100%;
    }

    /* This ensures the image takes the same height as the form */
    .col-md-6 img {
        height: 100%;
    }

    /* Styling for the card */
    .card {
        border-radius: 15px;
        border: none;
    }

    /* Ensuring the form and image match in height */
    .col-md-6 {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    /* Custom card padding */
    .p-4 {
        padding: 2rem !important;
    }

    /* Responsive image */
    .img-fluid {
        border-top-right-radius: 15px;
        border-bottom-right-radius: 15px;
    }


    body {
        background-color: #f8f8f8;
        "

    }
</style>

<body>

    <body>
        @include('users.navbar')
        <!-- END nav -->






        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <section class="contact-section">
            <div class="container my-5">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card shadow-sm" style="background-color: #f8f8f8;">
                            <div class="row no-gutters">
                                <div class="col-md-6 p-4">
                                    <h2 class="mb-4">Contact Us</h2>
                                    <form action="/upload_contact" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Full Name</label>
                                            <input type="text" id="name" name="name" class="form-control"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" id="email" name="email" class="form-control"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone Number</label>
                                            <input type="tel" id="phone" name="phone" class="form-control"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="service">Select Service</label>
                                            <select id="service" name="service" class="form-control" required>
                                                <option value="haircut">Haircut</option>
                                                <option value="coloring">Hair Coloring</option>
                                                <option value="manicure">Manicure</option>
                                                <option value="pedicure">Pedicure</option>
                                                <option value="facial">Facial</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="date">Preferred Date</label>
                                            <input type="date" id="date" name="date"
                                                min="{{ \Carbon\Carbon::today()->toDateString() }}" class="form-control"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="time">Preferred Time</label>
                                            <input type="time" id="time" name="time" class="form-control"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="message">Additional Message</label>
                                            <textarea id="message" name="message" rows="5" class="form-control"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-secondary btn-block">Submit</button>
                                    </form>
                                </div>
                                <!-- Location or any other content goes here -->
                                <div class="col-md-6">
                                    <img src="users/images/contact.jpg" alt="Location Image" class="img-fluid"
                                        style="object-fit: cover; height: 100%;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('users.footer')
        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
        </script>
    </body>

</html>
