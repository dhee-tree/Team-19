@extends('layouts.base')

@section('title', 'WoodLess - About Us')
@section('content')
    <style>
        /*-- -------------------------- -->
            <---           Stats            -->
            <--- -------------------------- -*/

        .shush .cs-button-solid {
            margin-right: 10px;
            /* Adjust margin between buttons as needed */
        }

        .shush .cs-button-solid:last-child {
            margin-right: 0;
            /* Remove margin from the last button */
        }

        .shush {
            display: flex;
            flex-wrap: nowrap;
            /* Prevent wrapping to the next line */
        }

        #stats-1687 .cs-button-solid {
            margin-right: 10px;
            /* Adjust margin between buttons as needed */
        }

        /* Mobile - 360px */
        @media only screen and (min-width: 0rem) {
            #stats-1687 {
                padding: var(--sectionPadding);
            }

            #stats-1687 .cs-container {
                width: 100%;
                /* changes to 1920px at tablet */
                max-width: 36.5rem;
                margin: auto;
                display: flex;
                flex-direction: column;
                align-items: stretch;
                /* 48px - 100px */
                gap: clamp(3rem, 7vw, 6.25rem);
            }

            #stats-1687 .cs-wrapper {
                width: 100%;
                /* 48px - 64px */
                max-width: 80rem;
                margin: auto;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: flex-start;
                /* 48px - 64px */
                gap: clamp(3rem, 6vw, 4rem);
            }

            #stats-1687 .cs-content {
                /* set text align to left if content needs to be left aligned */
                text-align: left;
                width: 100%;
                max-width: 33.875rem;
                display: flex;
                flex-direction: column;
                /* centers content horizontally, set to flex-start to left align */
                align-items: flex-start;
            }

            #stats-1687 .cs-text {
                margin-bottom: 1rem;
                margin-left: 2rem;
            }

            #stats-1687 .cs-title {

                margin-left: 2rem;
            }

            #stats-1687 .cs-text:last-of-type {
                margin-bottom: 2rem;
            }

            #stats-1687 .cs-button-solid {
                font-size: 1rem;
                font-weight: 700;
                /* 46px - 56px */
                line-height: clamp(2.875rem, 5.5vw, 3.5rem);
                text-align: center;
                text-decoration: none;
                min-width: 9.375rem;
                margin: 0;
                /* prevents padding from adding to the width */
                box-sizing: border-box;
                padding: 0 1.5rem;


                display: inline-block;
                position: relative;
                z-index: 1;
            }

            #stats-1687 .cs-button-solid:before {
                content: "";
                width: 0%;
                height: 100%;
                background: #000;
                opacity: 1;
                border-radius: 0.25rem;
                position: absolute;
                top: 0;
                left: 0;
                z-index: -1;
                transition: width 0.3s;
            }

            #stats-1687 .cs-button-solid:hover:before {
                width: 100%;
            }

            #stats-1687 .cs-picture {
                width: 100%;
                max-width: 39.375rem;
                height: auto;
                /* 400px - 600px */
                min-height: clamp(25rem, 68vw, 37.5rem);
                margin: 0;
                display: block;
                position: relative;
                z-index: 1;
                align-self: stretch;
            }

            #stats-1687 .cs-picture img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                position: absolute;
                top: 0;
                left: 0;
            }

            #stats-1687 .cs-card-group {
                list-style: none;
                margin: 0;
                padding: 0;
                display: grid;
                grid-auto-flow: row;
                /* 16px - 40px */
                gap: clamp(1rem, 3vw, 2.5rem);
            }

            #stats-1687 .cs-item {
                width: 100%;
                /* 20px - 40px */
                padding: clamp(1.25rem, 3vw, 2.5rem);
                background-color: #f7f7f7;
                display: flex;
                /* 24px - 80px */
                flex-direction: column;
                gap: clamp(1.5rem, 6vw, 5rem);
                position: relative;
                overflow: hidden;
            }

            #stats-1687 .cs-h3 {
                /* 16px - 20px */
                font-size: clamp(1rem, 2vw, 1.25rem);
                font-weight: 700;
                line-height: 1.2em;
                margin: 0;
                color: var(--primary);
                z-index: 1;
            }

            #stats-1687 .cs-number {
                /* 49px - 61px */
                font-size: clamp(3.0625rem, 5vw, 3.8125rem);
                font-weight: 900;
                line-height: 1.2em;
                color: var(--headerColor);
                z-index: 1;
            }

            #stats-1687 .cs-graphic {
                /* 131px - 233px */
                width: clamp(8.1875rem, 16vw, 14.5625rem);
                /* 131px - 233px */
                height: clamp(8.1875rem, 16vw, 14.5625rem);
                position: absolute;
                /* -49px - -37px */
                right: clamp(-3.0625rem, -4vw, -2.3125rem);
                /* -8px - -40px */
                bottom: calc(clamp(0.5rem, 3vw, 2.5rem) * -1);
                z-index: 0;
            }
        }

        /* Tablet - 768px */
        @media only screen and (min-width: 48rem) {
            #stats-1687 .cs-container {
                max-width: 120rem;
            }

            #stats-1687 .cs-wrapper {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                align-items: stretch;
                gap: 2.5rem;
            }

            #stats-1687 .cs-content {
                padding: 4rem 0;
                align-self: center;
            }

            #stats-1687 .cs-picture {
                /* sends it to the right in the 2nd position */
                order: 2;
            }

            #stats-1687 .cs-card-group {
                grid-template-columns: repeat(4, 1fr);
            }
        }
    </style>

    <section id="stats-1687">
        <div class="cs-container">
            <div class="cs-wrapper">
                <picture class="cs-picture">
                    <source media="(max-width: 600px)" srcset="{{ secure_asset('images/river-1851031_1280.jpg') }}">
                    <source media="(min-width: 601px)" srcset="{{ secure_asset('images/river-1851031_1280.jpg') }}">
                    <img loading="lazy" decoding="async" src="{{ secure_asset('images/river-1851031_1280.jpg') }}">

                </picture>
                <div class="cs-content">
                    <h2 class="cs-title">Our Mission</h2>
                    <p class="cs-text">
                        At WoodLess, our mission is to redefine the concept of furniture by seamlessly blending
                        sustainability,
                        craftsmanship, and timeless design. We are committed to crafting high-quality furniture pieces that
                        not only enhance living spaces but also contribute to a more sustainable future. By utilizing
                        innovative
                        eco-friendly materials and employing ethical manufacturing practices, we strive to minimize
                        our environmental footprint while maximizing the durability and functionality of our products.
                        With every piece we create, we aim to inspire conscious living and foster a deeper connection
                        between
                        people and their surroundings. At WoodLess, we believe that sustainable
                        furniture isn't just a choice; it's a lifestyle that benefits both individuals and the planet.
                    </p>
                    <div class = "shush">
                        <div class = "button1">
                            <a class="cs-button-solid" href="/values">Our Values</a>
                        </div>
                        <div class = "button2">
                            <a class="cs-button-solid" href="/meet-the-team">Meet the team</a>
                        </div>
                        <div class = "button3">
                            <a class="cs-button-solid" href="/faq">FAQs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <ul class="cs-card-group">
            <li class="cs-item">
                <h3 class="cs-h3">Recycled materials used </h3>
                <span class="cs-number">100%</span>
                <img class="cs-graphic"
                    src="https://csimg.nyc3.cdn.digitaloceanspaces.com/Images/Icons/enterprise-logo-white.svg"
                    alt="graphic" height="171" width="171" loading="lazy" decoding="async" aria-hidden="true">
            </li>
            <li class="cs-item">
                <h3 class="cs-h3">Gallons of water saved</h3>
                <span class="cs-number">50,000</span>
                <img class="cs-graphic"
                    src="https://csimg.nyc3.cdn.digitaloceanspaces.com/Images/Icons/enterprise-logo-white.svg"
                    alt="graphic" height="171" width="171" loading="lazy" decoding="async" aria-hidden="true">
            </li>
            <li class="cs-item">
                <h3 class="cs-h3">Trees planted</h3>
                <span class="cs-number">20,000</span>
                <img class="cs-graphic"
                    src="https://csimg.nyc3.cdn.digitaloceanspaces.com/Images/Icons/enterprise-logo-white.svg"
                    alt="graphic" height="171" width="171" loading="lazy" decoding="async" aria-hidden="true">
            </li>
            <li class="cs-item">
                <h3 class="cs-h3">Plastic Bottles Recycled</h3>
                <span class="cs-number">500,000</span>
                <img class="cs-graphic"
                    src="https://csimg.nyc3.cdn.digitaloceanspaces.com/Images/Icons/enterprise-logo-white.svg"
                    alt="graphic" height="171" width="171" loading="lazy" decoding="async" aria-hidden="true">
            </li>
        </ul>
        </div>
    </section>
    <script></script>

@endsection
