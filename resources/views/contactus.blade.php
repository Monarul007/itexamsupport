@extends('layouts.header')

@section('content')
        <section class="contact" style="background-image: url(/images/contact.jpeg); background-size: cover; background-repeat: no-repeat;">
            <div class="content content text-center mb-5">
                <h1 class="text-light">Contact Us</h1>
                <p>IT Exam Support for all</p>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="contactInfo">
                            <div class="box">
                                <div class="icon"><i class="fa fa-map-marker"></i></div>
                                <div class="text">
                                    <h3>Address</h3>
                                    <p>Plot:07,Road:06,Sector:04, Dhaka 1230</p>
                                </div>
                            </div>
                            <div class="box">
                                <div class="icon"><i class="fa fa-phone"></i></div>
                                <div class="text">
                                    <h3>Phone</h3>
                                    <p>+880 1618884435</p>
                                </div>
                                
                            </div>
                            <div class="box">
                                <div class="icon"><i class="fa fa-envelope-o"></i></div>
                                <div class="text">
                                    <h3>Email</h3>
                                    <p>info@itexamsupport.com</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contcatForm bg-light p-5">
                            <h3>Send A Message</h3>
                            <form method="post" action="mail.php" novalidate="novalidate">
                                <div class="form-group">
                                    <label>Name:</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
                                </div>
                                <div class="form-group">
                                    <label>Email:</label>
                                    <input type="email" class="form-control" id="name" placeholder="Enter Email" name="email">
                                </div>
                                
                                <div class="form-group">
                                    <label>Phone No.:</label>
                                    <input type="text" class="form-control" id="phone" placeholder="Enter Phone no." name="phone">
                                </div>
                                <div class="form-group">
                                    <label>Vendor Exam:</label>
                                    <input type="text" class="form-control" id="name" placeholder="vendor exam" name="vendor_exam">
                                </div>
                                <div class="form-group">
                                    <label>Message:</label>
                                    <textarea name="issues" class="form-control" id="iq" placeholder="Type your message... "></textarea>
                                </div>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>       
            </div>
        </section>
@endsection

    <style>

    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'oppins', sans-serif;
    }
    .contact
    {
        position: relative;
        min-height: 100vh;
        padding: 50px 100px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        background-size: cover;
    }
    .contact .content h2
    {
        font-size: 36px;
        font-weight: 500;
        color: #fff;
    }
    .contact .content p
    {
        font-weight: 300;
        color: #fff;
    }
    .container .contactInfo .box
    {
        position: relative;
        padding: 20px 0;
        display: flex;
    }
    .container .contactInfo .box .icon
    {
        min-width: 60px;
        height: 60px;
        background: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        font-size: 22px;
    }
    .container .contactInfo .box .text
    {
        display: flex;
        margin-left: 20px;
        font-size: 16px;
        color: #fff;
        flex-direction: column;
        font-weight: 300;
    }
    .container .contactInfo .box .text h3
    {
        font-weight: 500;
        color: #00bcd4;
    }
    .contactForm
    {
        width: 40%;
        padding: 40px;
        background: #fff;
    }
    .contactForm h2
    {
        font-size: 30px;
        color: #333;
        font-weight: 500;
    }
    .contactForm .inputBox
    {
        position: relative;
        width: 100%;
        margin-top: 10px;
    }
    .contactForm .inputBox input,
    .contactForm .inputBox textarea
    {
        width: 100%;
        padding: 5px 0;
        font-size: 16px;
        margin: 10px 0;
        border: none;
        border-bottom: 2px solid #333;
        outline: none;
        resize: none;
    }
    .contactForm .inputBox span
    {
        position: absolute;
        left: 0;
        padding: 5px 0;
        font-size: 16px;
        margin: 10px 0;
        pointer-events: none;
        transition: 0.5s;
        color: #666;

    }
    .contactForm .inputBox input:focus ~ span,
    .contactForm .inputBox input:valid ~ span,
    .contactForm .inputBox textarea:focus ~ span,
    .contactForm .inputBox textarea:valid ~ span
    {
        color: #e91e63;
        font-size: 12px;
        transform: translateY(-20px);


    }
    .contactForm .inputBox input[type="submit"]
    {
        width: 100px;
        background: #00bcd4;
        color: #fff;
        border: none;
        cursor: pointer;
        padding: 10px;
        font-size: 18px;
    }
    @media (max-width: 991px)
    {
        .contact
        {
            padding: 50px;
        }
        .container
        {
            flex-direction: column;
        }
        .container .contactInfo
        {
            margin-bottom: 40px;
        }
        .container .contactInfo
        {
            width: 100px;
        }
    }
    </style>
</html>