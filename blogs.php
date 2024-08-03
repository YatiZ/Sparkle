<?php
session_start();

?>
<style>
    .container {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        overflow: hidden;
    }

    .blog_card {
        margin: 25px;
        width: 100%;
        /* min-height: 150px; */
        background: rgba(255, 255, 255, 0.15);
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        backdrop-filter: blur(18px);
        -webkit-backdrop-filter: blur(18px);
        border: 1px solid rgba(255, 255, 255, 0.18);
        border-radius: 1rem;
        padding: 1.5rem;
        z-index: 10;

    }

    .main-title {
        margin-top: 80px;
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

    .head {
        font-size: 20px;
        font-weight: bold;
    }
</style>
<?php
require 'header.php';
?>
<h1 class="text-center main-title">Our Newsletter</h1>
<div class="container">
    <div class="blog_card">
        <div class="headline">
            <div class="head">
                Identify Your Body Shape
            </div>
            <div>10/7/2024</div>
        </div>
        <div class="subtitle">
            <p>
                Knowing your body shape can help you choose clothing that accentuates your best features. Common body
                shapes include pear, apple, hourglass, and rectangle. Once you know your shape, you can focus on
                highlighting your strengths.
                <br>
                <li>Pear Shape: Emphasize your waist with A-line skirts and dresses. Avoid clothes that make your
                    hips look wider.</li>
                <li>Apple Shape: Go for empire waistlines and flowy tops that draw attention away from the
                    midsection.</li>
                <li>Hourglass Shape: Highlight your curves with fitted clothing and belts.</li>
                <li>Rectangle Shape: Create curves with peplum tops and ruffled skirts.</li>
                Play with Proportions:

                Balance your outfits by playing with proportions. If you wear a fitted top, consider pairing it with
                loose bottoms and vice versa. This balance can create a flattering silhouette.

                Color and Patterns:

                Use color and patterns to your advantage. Dark colors can be slimming, while bright colors can draw
                attention. Patterns can also be used strategically to highlight certain areas or add visual interest.
            </p>
        </div>
        <div>
            writer - <small><b>IONS</b></small>
        </div>
    </div>
</div>

<div class="container">
    <div class="blog_card">
        <div class="headline">
            <div class="head">
                Accessorizing Like a Pro
            </div>
            <div>10/7/2024</div>
        </div>
        <div class="subtitle">
            <p>
                Don't be afraid to wear bold accessories like statement necklaces, oversized sunglasses, or colorful
                bags. These pieces can elevate a simple outfit and add a touch of personality.
                <br>
                <b>Less is More:</b>
                Sometimes, less is more when it comes to accessories. If you're wearing a bold outfit, consider opting
                for simple accessories to keep the focus on your clothing.
                <br>
                <b>Experiment with Hats and Scarves:</b>
                Hats and scarves are not only practical but can also be stylish additions to your wardrobe. Try
                different styles like beanies, fedoras, or silk scarves to find what complements your look.
                <br>
                <b>Coordinate with Your Outfit:</b>
                Ensure your accessories complement your outfit. The colors and styles should work together rather than
                clash.


            </p>
        </div>
        <div>
            writer - <small><b>IONS</b></small>
        </div>
    </div>
</div>

<div class="container">
    <div class="blog_card">
        <div class="headline">
            <div class="head">Maintaining a Balanced Diet</div>
            <div>26/7/2024</div>
        </div>
        <div class="subtitle">
            <p>
                Ensure your diet includes a variety of fruits, vegetables, whole grains, proteins, and healthy fats.
                This variety provides the essential nutrients your body needs to function correctly.
                <br>
                <b>Portion Control:</b>

                Be mindful of portion sizes to avoid overeating. Using smaller plates and being aware of serving sizes
                can help you maintain a balanced diet.
                <br>
                <b>Stay Hydrated:</b>

                Drinking enough water is crucial for overall health. Aim for at least 8 glasses a day, and remember that
                hydration can come from foods like fruits and vegetables too.
                <br>
                <b>Limit Processed Foods:</b>

                Try to limit your intake of processed foods high in sugar, salt, and unhealthy fats. Focus on whole
                foods and cooking meals at home to control what goes into your food.
            </p>
        </div>
        <span> writer - <b>OSWEGO</b></span>
    </div>
</div>

<div class="container">
    <div class="blog_card">
        <div class="headline">
            <div class="head">Mental Health and Self-Care</div>
            <div>2/8/2024</div>
        </div>
        <div class="subtitle">
            <p>
                Mindfulness techniques like meditation, deep breathing, and yoga can help reduce stress and improve
                mental clarity. Take time each day to practice mindfulness and focus on the present moment.

                Build a Support Network:

                Surround yourself with supportive friends and family who uplift and encourage you. Having a strong
                support network can help you navigate life's challenges more effectively.

                Prioritize Self-Care:

                Make self-care a priority by setting aside time for activities that make you happy and relaxed. This
                might include reading, taking a bath, or pursuing a hobby you love.

                Seek Professional Help:

                If you're struggling with mental health issues, don't hesitate to seek professional help. Therapists and
                counselors can provide valuable support and guidance.
            </p>
        </div>
        <span> writer - <b>UAB.Edu</b></span>
    </div>
</div>
<?php
require 'footer.php';
?>