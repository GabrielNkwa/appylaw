<!DOCTYPE html>
<html lang="en" class="">
    <head>
        <meta charset="UTF-8" />
        <title>Error 500</title>

        <meta name="robots" content="noindex" />

        <link rel="shortcut icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico" />
        <link rel="mask-icon" type="" href="https://cpwebassets.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111" />
        <link rel="canonical" href="https://codepen.io/fcasantos/pen/LJXeKP" />

        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merriweather:400,400i" />

        <style class="INLINE_PEN_STYLESHEET_ID">
            html {
                box-sizing: border-box;
            }

            *,
            *::before,
            *::after {
                box-sizing: inherit;
            }

            body * {
                margin: 0;
                padding: 0;
            }

            body {
                font: normal 100%/1.15 "Merriweather", serif;
                background-color: #ffb426;
                color: #fff;
            }

            .wrapper {
                position: relative;
                max-width: 1298px;
                height: auto;
                margin: 2em auto 0 auto;
            }

            /* https://www.flaticon.com/authors/vectors-market */
            /* https://www.flaticon.com/authors/icomoon */
            .box {
                max-width: 70%;
                min-height: auto;
                margin: 0 auto;
                padding: 1em 1em;
                text-align: center;
                background: url("https://www.dropbox.com/s/xq0841cp3icnuqd/flame.png?raw=1") no-repeat top 10em center/128px 128px,
                    transparent url("https://www.dropbox.com/s/w7qqrcvhlx3pwnf/desktop-pc.png?raw=1") no-repeat top 13em center/128px 128px;
            }

            h1,
            p:not(:last-of-type) {
                text-shadow: 0 0 6px #216f79;
            }

            h1 {
                margin: 0 0 1rem 0;
                font-size: 8em;
            }

            p {
                margin-bottom: 0.5em;
                font-size: 3em;
            }

            p:first-of-type {
                margin-top: 4em;
            }

            p > a {
                border-bottom: 1px dashed #216f79;
                font-style: italic;
                text-decoration: none;
                color: #216f79;
            }

            p > a:hover {
                text-shadow: 0 0 6px #216f79;
            }

            p img {
                vertical-align: bottom;
            }
        </style>

        <script src="https://cpwebassets.codepen.io/assets/editor/iframe/iframeConsoleRunner-d8236034cc3508e70b0763f2575a8bb5850f9aea541206ce56704c013047d712.js"></script>
        <script src="https://cpwebassets.codepen.io/assets/editor/iframe/iframeRefreshCSS-4793b73c6332f7f14a9b6bba5d5e62748e9d1bd0b5c52d7af6376f3d1c625d7e.js"></script>
        <script src="https://cpwebassets.codepen.io/assets/editor/iframe/iframeRuntimeErrors-4f205f2c14e769b448bcf477de2938c681660d5038bc464e3700256713ebe261.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    </head>

    <body>
        <div class="wrapper">
            <div class="box">
                <h1>500</h1>
                <p>Sorry, something went wrong with our server please try again.</p>
                @if(user())
                    <p><a href="{{ route('dashboard') }}">go back to dashboard!</a></p>
                @else
                    <p><a href="{{ route('index') }}">go back to home page!</a></p>
                @endif
            </div>
        </div>

        <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-8216c69d01441f36c0ea791ae2d4469f0f8ff5326f00ae2d00e4bb7d20e24edb.js"></script>
        <script src="https://cdpn.io/cp/internal/boomboom/pen.js?key=pen.js-a55e5ab9-f4e4-9086-b01b-a284a5fa5bf5" crossorigin></script>
    </body>
</html>
