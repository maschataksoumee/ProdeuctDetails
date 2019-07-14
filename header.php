<html>
    <head>
        <title>Product Details</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            .nav-item:hover{
                text-decoration: underline;
                background-color: #ccd5dd;
                font-weight: bold;
            }
            .active{
                background-color: #ccd5dd; 
            }
            #loading-bar-spinner.spinner {
                left: 50%;
                margin-left: -20px;
                top: 50%;
                margin-top: -20px;
                position: absolute;
                z-index: 19 !important;
                animation: loading-bar-spinner 1000ms linear infinite;
            }
            #loading-bar-spinner.spinner .spinner-icon {
                width: 90px;
                height: 90px;
                border:  solid 8px transparent;
                border-top-color:  red !important;
                border-left-color: red !important;
                border-radius: 100%;
            }
            @keyframes loading-bar-spinner {
            0%   { transform: rotate(0deg);   transform: rotate(0deg); }
            100% { transform: rotate(360deg); transform: rotate(360deg); }
            }
        </style>
    </head>
    <body>