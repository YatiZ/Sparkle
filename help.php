<?php
session_start();

?>
<style>
    .main-title {
        margin-top: 80px;
    }

    .main-title {
        margin-bottom: 0.5rem;
        text-align: center;
        font-family: 'Abril Fatface', cursive;
        font-size: 2.32rem;
        color: black;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .main-title:before,
    .main-title:after {
        content: '';
        display: block;
        margin: 0 0.2rem;
        flex: 1;
        border-bottom: 1px solid #2e8074;
    }

    :root {
        --size-header: 2.25rem;
        --size-accordion-title: 1.25rem;
        --size-accordion-content: 1rem;
        --animation-speed: 100;
        --slide-ease: cubic-bezier(0.86, 0, 0.07, 1);
        --slide-duration: calc(400ms * 100 / var(--animation-speed));
        --slide-delay: calc(450ms * 100 / var(--animation-speed));
        --circle-duration: calc(900ms * 100 / var(--animation-speed));
    }

    *,
    *::before,
    *::after {
        position: relative;
        left: 0;
        top: 0;
        box-sizing: border-box;
    }


    main>h1 {
        font-size: var(--size-header);
        margin-bottom: 1.25rem;
        color: #fff;
    }

    ::selection {
        background-color: rgba(0, 0, 0, 0.4);
    }

    .accordion {
        --circle-x: 1.8rem;
        --circle-y: 0;
        --circle-r: 200%;
        --circle-bg: #fff;
        color: #000;

        background-color: var(--circle-bg);
        /* max-width: 56ch; */
        margin-bottom: 1rem;
        border-radius: min(8px, 0.5rem);

        display: grid;
        grid-template-rows: 0fr 0fr;
        transition-timing-function: var(--slide-ease);
        transition-duration: 200ms, 200ms, var(--slide-duration);
        transition-property: opacity, box-shadow, grid-template-rows;
        transition-delay: 0ms, 0ms, var(--slide-delay);
        box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.1);
        opacity: 0.9;
    }

    .accordion:not(:target):hover {
        box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.5);
    }

    .accordion:not(:target):active {
        opacity: 1;
        box-shadow: 0 4px 7px 0 rgba(0, 0, 0, 0.3);
    }

    .accordion,
    .content {
        overflow: hidden;
    }

    .accordion:target {
        --d: 90deg;
        grid-template-rows: 0fr 1fr;
        transition: grid-template-rows var(--slide-ease) var(--slide-duration) var(--slide-delay);
    }

    .wrapper {
        padding-block: 0 1.05rem;
        padding-inline: 1.25rem;
    }

    .content {
        font-size: var(--size-accordion-content);
        line-height: 140%;
    }

    .content p {
        margin-bottom: 1rem;
    }

    .content a {
        color: currentColor;
        font-weight: 800;
        text-decoration: underline;
    }

    main :last-child,
    .content :last-child {
        margin-bottom: 0;
    }

    .title a {
        padding: 1rem 1.25rem;
        font-size: var(--size-accordion-title);
        font-weight: 800;
        color: currentColor;
        text-decoration: none;
        display: flex;
        flex-direction: row;
        place-items: center;
    }

    .title a::before {
        --chevron-icon: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 320 512'%3E%3C!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --%3E%3Cpath fill='white' d='M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z'/%3E%3C/svg%3E");
        content: "";
        left: 0;
        top: 0;
        width: 0.65rem;
        aspect-ratio: 320 / 512;
        display: inline-block;
        margin-right: 0.75rem;
        transform: rotate(var(--d, 0deg));
        transition: transform var(--slide-ease) var(--slide-duration) var(--slide-delay);
        mask-image: var(--chevron-icon);
        mask-size: 100% 100%;
        -webkit-mask-image: var(--chevron-icon);
        -webkit-mask-size: 100% 100%;
        background-color: currentColor;
    }

    .accordion::before,
    .accordion::after {
        content: "";
        position: absolute;
        width: 100%;
        height: 100%;
        background-color: var(--circle-bg);
        mix-blend-mode: difference;
        transform-style: preserve-3d;
        transition-timing-function: ease;
        transition-property: opacity, clip-path, visibility;
        pointer-events: none;
        clip-path: circle(var(--r) at var(--circle-x) var(--circle-y));
        border-radius: inherit;
        z-index: 4;
    }

    .accordion::before {
        --r: 0%;
        transition-delay: var(--circle-duration), var(--circle-duration), 0ms;
        transition-duration: 0ms, var(--circle-duration), 0ms;
        opacity: 0;
    }

    .accordion:target::before {
        --r: var(--circle-r);
        transition-delay: 0ms, 0ms, 0ms;
        transition-duration: 0ms, var(--circle-duration), 0ms;
        opacity: 1;
    }

    .accordion::after {
        --r: var(--circle-r);
        transition-delay: 0ms, 0ms, var(--circle-duration);
        transition-duration: 0ms, var(--circle-duration), 0ms;
        visibility: hidden;
        opacity: 1;
    }

    .accordion:target:after {
        --r: 0%;
        transition-delay: 0ms, 0ms, 0ms;
        transition-duration: 0ms, 0ms, 0ms;
        visibility: visible;
        opacity: 0;
    }

    .title a:focus-visible {
        background-color: hsl(0, 100%, 90%);
        outline: none;
    }

    .accordion:target .title a:focus-visible {
        background-color: hsl(183, 100%, 93%);
    }
</style>
<?php
require 'header.php';
?>
<div class="main-title">Shopping Help</div>
<div class="wrapper container">


    <main>
        <h1>CSS-Only Animated Accordion</h1>
        <section class="accordion" id="overview">
            <h1 class="title"><a href="#overview">1. What is your return policy?</a></h1>
            <div class="content">
                <div class="wrapper">
                    <p>
                        We offer a <strong>30-day</strong> return policy. Items must be returned in their original
                        condition, unworn and with tags attached. To start a return, please visit our Contact Center on
                        the website and send messages.
                    </p>
                </div>
            </div>
        </section>

        <section class="accordion" id="how-does-it-work">
            <h1 class="title"><a href="#how-does-it-work">2. Can I change or cancel my order after it has been
                    placed?</a></h1>
            <div class="content">
                <div class="wrapper">
                    <p>
                        If you need to change or cancel your order, please contact our customer service team as soon as
                        possible. We will do our best to accommodate your request, but once the order has been
                        processed, we may not be able to make changes.
                    </p>
                </div>
            </div>
        </section>

        <section class="accordion" id="inspiration">
            <h1 class="title"><a href="#inspiration">3. How can I use a promo code?</a></h1>
            <div class="content">
                <div class="wrapper">
                    <p>
                        To use a promo code, enter the code at checkout in the "Promo Code" box and click "Apply." The
                        discount will be applied to your order total.
                    </p>

                </div>
            </div>
        </section>

        <section class="accordion" id="inspiration">
            <h1 class="title"><a href="#inspiration">4. How do I create an account?</a></h1>
            <div class="content">
                <div class="wrapper">
                    <p>
                        To create an account, click on the "Sign Up" button at the top right corner of the homepage.
                        Fill in your details, including your email address and a password, then click "Create Account."
                        You will receive a confirmation email to verify your account.
                    </p>

                </div>
            </div>
        </section>

        <section class="accordion" id="inspiration">
            <h1 class="title"><a href="#inspiration">5. How do I place an order?</a></h1>
            <div class="content">
                <div class="wrapper">
                    <p>
                        Browse our collection and select the items you wish to purchase by clicking "Add to Cart." Once
                        you're ready, click on the shopping cart icon and proceed to checkout. Enter your shipping
                        information, select your payment method, and confirm your order.
                    </p>

                </div>
            </div>
        </section>

        <section class="accordion" id="inspiration">
            <h1 class="title"><a href="#inspiration">6. What if I forget my password?</a></h1>
            <div class="content">
                <div class="wrapper">
                    <p>
                        If you forget your password, click on the "Forgot Password?" link on the login page. Enter your
                        registered email address, and we will send you instructions on how to reset your password.
                    </p>

                </div>
            </div>
        </section>
    </main>
</div>


<?php
require 'footer.php';
?>
</body>

</html>