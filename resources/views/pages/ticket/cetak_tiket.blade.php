<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Acme&display=swap");
        @import url("https://fonts.googleapis.com/css2?family=Libre+Barcode+128&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* url("vendor/technext/vacation-rental/images/Poster template Full Color.png") */
        body {
            background: url("/vendor/technext/vacation-rental/images/rig.jpg");
            background-size: cover;
            background-position: center center;
            height: 100vh;
            display: grid;
            place-items: center;
            font-size: min(1.5rem, 2vw);
        }

        /* default logosvg color*/
        .logosvg {
            fill: black;
            stroke: black;
        }

        #ticket {
            color: white;
            display: flex;
            text-transform: uppercase;
            font-family: sans-serif;
            font-family: "Acme", sans-serif;
            background-color: rgb(200, 50, 5);
            background-image: linear-gradient(to bottom right,
                    rgba(255, 150, 0, 0.5),
                    rgba(10, 10, 150, 0.5)),
                url("https://www.transparenttextures.com/patterns/cream-paper.png");
            position: relative;
            box-shadow: 0 0 5em black, 0 0 5em black;
        }

        #ticket>*:not(.background) {
            filter: drop-shadow(0.05em 0.05em black);
        }

        #ticket .background {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            opacity: 0.15;
            filter: drop-shadow(0.25em 0.25em black);
        }

        #ticket .background .logosvg {
            fill: var(--color);
            stroke: var(--color);
            position: absolute;
            height: 100%;
            width: 100%;
        }

        #ticket .background .logosvg.left {
            --color: rgb(194, 171, 95);
            top: 0;
            left: 0;
            transform: translate(0%, 0%) scale(1);
        }

        #ticket .background .logosvg.right {
            --color: rgb(100, 13, 24);
            bottom: 0;
            right: 0;
            transform: translate(50%, 50%) scale(3);
        }

        #ticket .left {
            padding: 1.5em 3em;
            display: flex;
            flex-direction: column;
            gap: 1em;
        }

        #ticket .left .header {
            display: flex;
            align-items: center;
            gap: 1em;
        }

        #ticket .left .header .logosvg {
            height: 3em;
            /* width: 4em; */
            fill: white;
            stroke: white;
        }

        #ticket .left .header h1 {
            font-size: 4em;
            line-height: 1em;
        }

        #ticket .left h2 {
            font-size: 1.5em;
        }

        #ticket .left .details {
            font-size: 1em;
            display: grid;
            grid-template-columns: max-content auto max-content;
            border: 0.05em solid white;
        }

        #ticket .left .details>div {
            border: 0.05em solid white;
            padding: 0.2em 0.5em;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #ticket .left .details .code {
            grid-row: 1/3;
            grid-column: 3/4;
            font-size: 2.5em;
            border: 0.025em solid white;
        }

        #ticket .left .details .access {
            grid-column: 1/3;
            font-size: 12px;
        }

        #ticket .barcode {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 4em;
            border-right: 0.05em dashed rgb(223, 223, 223);
        }

        #ticket .barcode-container {
            transform: rotate(-90deg);
            position: relative;
            line-height: 1em;
        }

        #ticket .barcode-container::after {
            content: attr(title);
            font-family: "Libre Barcode 128", cursive;
            font-size: 3em;
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%);
        }

        #ticket .barcode-container::before {
            content: attr(title);
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
        }

        #ticket .right {
            padding: 1.5em;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            gap: 0.5em;
        }

        #ticket .right .logosvg {
            fill: white;
            stroke: white;
            height: 3em;
            width: 3em;
        }

        #ticket .right h1 {
            font-size: 1.5em;
        }

        #ticket .right h2 {
            font-size: 1em;
            word-wrap: all;
            max-width: 8em;
        }

        #ticket .right .details {
            font-size: 0.8em;
            display: grid;
            grid-template-columns: max-content max-content;
            border: 0.05em solid white;
        }

        #ticket .right .details>div {
            padding: 0.05em 0.5em;
            font-size: 1.2em;
        }

        #ticket .right .details>div:nth-child(odd) {
            border-right: 0.05em solid white;
        }

        #ticket .right .details>div:nth-child(-n + 2) {
            border-bottom: 0.05em solid white;
            font-size: 0.8em;
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <div id="ticket">
        <div class="background">
            <img class="logosvg left" src="{{ asset('vendor/technext/vacation-rental/images/pdsi-hd.png') }}" alt="" srcset="">
        </div>
        <div class="left">
            <div class="header">
                <img class="logosvg" src="{{ asset('vendor/technext/vacation-rental/images/pdsi-white.png') }}" alt="" srcset="">
                <!-- <h1>Ticket</h1> -->
            </div>
            <h2>PDSI Seat Reservation <span class="year-span">2021</span></h1>
                <div class="details">
                    <div class="day"><span class="day-span">{{$tglPemakaian}}</span></div>
                    <div class="date"><span class="fulldate-span">{{$tglPemakaian}}</span></div>
                    <div class="code"><span class="code-span">{{$kodeKursi}}</span></div>
                    <div class="access">
                        {{$fungsi}}
                        <br>
                        {{$jamMulai}} - {{$jamSelesai}}
                    </div>
                </div>
        </div>
        <div class="barcode">
            <div class="barcode-container" title="{{$kodeBooking}}"></div>
        </div>
        <div class="right">
            <svg class="logosvg">
                <use href="#logosvg">
            </svg>
            <h1>Ticket</h1>
            <h2>PDSI Seat Reservation </h1>
                <div class="details">
                    <div class="day"><span class="day-span">{{$tglPemakaian}}</span></div>
                    <div class="date"><span class="fulldate-span">{{$tglPemakaian}}</span></div>
                    <div class="code"><span class="code-span">{{$kodeKursi}}</span></div>
                    <div class="access" style="font-size: 12px;">
                        {{$fungsi}}
                        <br>
                        {{$jamMulai}} - {{$jamSelesai}}
                    </div>
                </div>
        </div>
    </div>
</body>
<script src="{{ asset('vendor/technext/vacation-rental/js/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/technext/vacation-rental/js/moment-with-locales.min.js') }}"></script>

<script>
    let daySpans = document.querySelectorAll(".day-span");
    daySpans.forEach((daySpan) => {
        daySpan.innerHTML = moment(daySpan.innerHTML).lang("id").format('dddd');
    });


    let fulldateSpans = document.querySelectorAll(".fulldate-span");
    fulldateSpans.forEach((fulldateSpan) => {
        fulldateSpan.innerHTML = moment(fulldateSpan.innerHTML).lang("id").format('D MMMM YYYY');
    });

    $('#my_account').on('click', function(e) {
        let url = e.target.attributes["data-href"].value;
        location.href = url;
    });


    const months = [
        "january",
        "februari",
        "march",
        "april",
        "may",
        "june",
        "july",
        "august",
        "september",
        "october",
        "november",
        "december"
    ];
    const days = [
        "sunday",
        "monday",
        "tuesday",
        "wednessday",
        "thursday",
        "friday",
        "saturday"
    ];
    const today = new Date();
    const year = today.getFullYear();
    const date = today.getDate();
    const month = months[today.getMonth()];
    const day = days[today.getDay()].substring(0, 3) + ".";
    const fullDate = `${date} ${month} ${year}`;
    const randomCodeGenerator = () => {
        const alphabet = "abcdefghijklmnopqrstuvwxyz";
        const numbers = "123456789";
        const firstLetter = alphabet[Math.floor(Math.random() * alphabet.length)];
        const secondLetter = alphabet[Math.floor(Math.random() * alphabet.length)];
        const number = numbers[Math.floor(Math.random() * numbers.length)];
        return firstLetter + secondLetter + number;
    };
    const randomCode = randomCodeGenerator();

    let yearSpans = document.querySelectorAll(".year-span");
    yearSpans.forEach((yearSpan) => {
        yearSpan.innerHTML = year;
    });
</script>

</html>