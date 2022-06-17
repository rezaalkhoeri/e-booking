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
    <style>
        .cybr-btn {
            --primary: hsl(var(--primary-hue), 85%, calc(var(--primary-lightness, 50) * 1%));
            --shadow-primary: hsl(var(--shadow-primary-hue), 90%, 50%);
            --primary-hue: 0;
            --primary-lightness: 50;
            --color: hsl(0, 0%, 100%);
            --font-size: 26px;
            --shadow-primary-hue: 180;
            --label-size: 9px;
            --shadow-secondary-hue: 60;
            --shadow-secondary: hsl(var(--shadow-secondary-hue), 90%, 60%);
            --clip: polygon(0 0, 100% 0, 100% 100%, 95% 100%, 95% 90%, 85% 90%, 85% 100%, 8% 100%, 0 70%);
            --border: 4px;
            --shimmy-distance: 5;
            --clip-one: polygon(0 2%, 100% 2%, 100% 95%, 95% 95%, 95% 90%, 85% 90%, 85% 95%, 8% 95%, 0 70%);
            --clip-two: polygon(0 78%, 100% 78%, 100% 100%, 95% 100%, 95% 90%, 85% 90%, 85% 100%, 8% 100%, 0 78%);
            --clip-three: polygon(0 44%, 100% 44%, 100% 54%, 95% 54%, 95% 54%, 85% 54%, 85% 54%, 8% 54%, 0 54%);
            --clip-four: polygon(0 0, 100% 0, 100% 0, 95% 0, 95% 0, 85% 0, 85% 0, 8% 0, 0 0);
            --clip-five: polygon(0 0, 100% 0, 100% 0, 95% 0, 95% 0, 85% 0, 85% 0, 8% 0, 0 0);
            --clip-six: polygon(0 40%, 100% 40%, 100% 85%, 95% 85%, 95% 85%, 85% 85%, 85% 85%, 8% 85%, 0 70%);
            --clip-seven: polygon(0 63%, 100% 63%, 100% 80%, 95% 80%, 95% 80%, 85% 80%, 85% 80%, 8% 80%, 0 70%);
            font-family: 'Cyber', sans-serif;
            color: var(--color);
            cursor: pointer;
            background: transparent;
            text-transform: uppercase;
            font-size: var(--font-size);
            outline: transparent;
            letter-spacing: 2px;
            position: relative;
            font-weight: 700;
            border: 0;
            min-width: 300px;
            height: 75px;
            line-height: 75px;
            transition: background 0.2s;
        }

        .cybr-btn:hover {
            --primary: hsl(var(--primary-hue), 85%, calc(var(--primary-lightness, 50) * 0.8%));
        }

        .cybr-btn:active {
            --primary: hsl(var(--primary-hue), 85%, calc(var(--primary-lightness, 50) * 0.6%));
        }

        .cybr-btn:after,
        .cybr-btn:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            clip-path: var(--clip);
            z-index: -1;
        }

        .cybr-btn:before {
            background: var(--shadow-primary);
            transform: translate(var(--border), 0);
        }

        .cybr-btn:after {
            background: var(--primary);
        }

        .cybr-btn__tag {
            position: absolute;
            padding: 1px 4px;
            letter-spacing: 1px;
            line-height: 1;
            bottom: -5%;
            right: 5%;
            font-weight: normal;
            color: hsl(0, 0%, 0%);
            font-size: var(--label-size);
        }

        .cybr-btn__glitch {
            position: absolute;
            top: calc(var(--border) * -1);
            left: calc(var(--border) * -1);
            right: calc(var(--border) * -1);
            bottom: calc(var(--border) * -1);
            background: var(--shadow-primary);
            text-shadow: 2px 2px var(--shadow-primary), -2px -2px var(--shadow-secondary);
            clip-path: var(--clip);
            animation: glitch 2s infinite;
            display: none;
        }

        .cybr-btn:hover .cybr-btn__glitch {
            display: block;
        }

        .cybr-btn__glitch:before {
            content: '';
            position: absolute;
            top: calc(var(--border) * 1);
            right: calc(var(--border) * 1);
            bottom: calc(var(--border) * 1);
            left: calc(var(--border) * 1);
            clip-path: var(--clip);
            background: var(--primary);
            z-index: -1;
        }

        @keyframes glitch {
            0% {
                clip-path: var(--clip-one);
            }

            2%,
            8% {
                clip-path: var(--clip-two);
                transform: translate(calc(var(--shimmy-distance) * -1%), 0);
            }

            6% {
                clip-path: var(--clip-two);
                transform: translate(calc(var(--shimmy-distance) * 1%), 0);
            }

            9% {
                clip-path: var(--clip-two);
                transform: translate(0, 0);
            }

            10% {
                clip-path: var(--clip-three);
                transform: translate(calc(var(--shimmy-distance) * 1%), 0);
            }

            13% {
                clip-path: var(--clip-three);
                transform: translate(0, 0);
            }

            14%,
            21% {
                clip-path: var(--clip-four);
                transform: translate(calc(var(--shimmy-distance) * 1%), 0);
            }

            25% {
                clip-path: var(--clip-five);
                transform: translate(calc(var(--shimmy-distance) * 1%), 0);
            }

            30% {
                clip-path: var(--clip-five);
                transform: translate(calc(var(--shimmy-distance) * -1%), 0);
            }

            35%,
            45% {
                clip-path: var(--clip-six);
                transform: translate(calc(var(--shimmy-distance) * -1%));
            }

            40% {
                clip-path: var(--clip-six);
                transform: translate(calc(var(--shimmy-distance) * 1%));
            }

            50% {
                clip-path: var(--clip-six);
                transform: translate(0, 0);
            }

            55% {
                clip-path: var(--clip-seven);
                transform: translate(calc(var(--shimmy-distance) * 1%), 0);
            }

            60% {
                clip-path: var(--clip-seven);
                transform: translate(0, 0);
            }

            31%,
            61%,
            100% {
                clip-path: var(--clip-four);
            }
        }

        .cybr-btn:nth-of-type(2) {
            --primary-hue: 260;
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    @foreach($getBooking as $row)
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
                    <div class="day"><span class="day-span">{{$row->tglPemakaian}}</span></div>
                    <div class="date"><span class="fulldate-span">{{$row->tglPemakaian}}</span></div>
                    <div class="code"><span class="code-span">{{$row->kodeKursi}}</span></div>
                    <div class="access">
                        {{$row->fungsi}}
                        <br>
                        {{$row->jamMulai}} - {{$row->jamSelesai}}
                    </div>
                </div>
        </div>
        <div class="barcode">
            <div class="barcode-container" title="{{$row->kodeBooking}}"></div>
        </div>
        <div class="right">
            <svg class="logosvg">
                <use href="#logosvg">
            </svg>
            <h1>Ticket</h1>
            <h2>PDSI Seat Reservation </h1>
                <div class="details">
                    <div class="day"><span class="day-span">{{$row->tglPemakaian}}</span></div>
                    <div class="date"><span class="fulldate-span">{{$row->tglPemakaian}}</span></div>
                    <div class="code"><span class="code-span">{{$row->kodeKursi}}</span></div>
                    <div class="access" style="font-size: 12px;">
                        {{$row->fungsi}}
                        <br>
                        {{$row->jamMulai}} - {{$row->jamSelesai}}
                    </div>
                </div>
        </div>
    </div>
    <div class="row">
        <!-- <button class="cybr-btn" id="download" data-href="{{route('download-ticket', $row->ID)}}" href="#">
            Download <span aria-hidden class="fa fa-download"></span>
            <span aria-hidden class="cybr-btn__glitch">Download</span>
        </button> -->
        <button class="cybr-btn" id="my_account" data-href="{{route('my-account')}}">
            My Account <span aria-hidden class="fa fa-user"></span>
            <span aria-hidden class="cybr-btn__glitch">My Account</span>
        </button>
    </div>
    @endforeach
</body>
<script src="{{ asset('vendor/technext/vacation-rental/js/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/technext/vacation-rental/js/html2canvas.js') }}"></script>
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

    // $('#download').on('click', function(e) {
    //     let url = e.target.attributes["data-href"].value;
    //     location.href = url;
    // });

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
    // let daySpans = document.querySelectorAll(".day-span");
    // daySpans.forEach((daySpan) => {
    //     daySpan.innerHTML = day;
    // });
    // let fulldateSpans = document.querySelectorAll(".fulldate-span");
    // fulldateSpans.forEach((fulldateSpan) => {
    //     fulldateSpan.innerHTML = fullDate;
    // });
    // let codeSpans = document.querySelectorAll(".code-span");
    // codeSpans.forEach((codeSpan) => {
    //     codeSpan.innerHTML = randomCode;
    // });

    // let barCodeContainer = document.querySelector(".barcode-container");
    // barCodeContainer.title = Math.floor(Math.random() * 1000000000);
</script>

</html>