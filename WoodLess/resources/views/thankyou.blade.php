@extends('layouts.base')
@section('title', 'WoodLess - Thank you')


   <style>
    .thank-you-container {
            text-align: center;
            margin-top: 50px;
        }

        .thank-you-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 10px 18px 11px 0px rgb(0 148 174);
            padding: 30px;
            opacity: 0;
            animation: fadeIn 2s forwards;
            max-width: 600px;
            margin: 0 auto;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .thank-you-container h2 {
            color: #333;
            font-size: 28px;
            margin-bottom: 20px;
        }

        .thank-you-container p {
            color: #000;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .thank-you-container .gradient-button {
            background: linear-gradient(45deg, #4CAF50, #2196F3);
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .thank-you-container .gradient-button:hover {
            background: linear-gradient(45deg, #43A047, #1E88E5);
        }

        @media only screen and (max-width: 768px) {
            .thank-you-card {
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }
        }
    </style>



@section('content')
<div class="thank-you-container">
    <div class="thank-you-card">
        <h2>Thank You</h2>
        <p>Thank you for your feedback it is greatly appreciated</p>
   
        <p>Click <a class="gradient-button" href="{{ route('home') }}">here</a> to return to the home page.</p>
 

    </div>
    <div class="col-md-4"></div>
</div>
@endsection 